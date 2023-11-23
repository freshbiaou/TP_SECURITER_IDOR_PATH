<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Assignation;
use App\Models\Departement;
use App\Models\Message;
use App\Models\Ticket;
use App\Models\User;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->can();
    }

    public function index()
    {
        if ($this->user('roles') == 'Admin') {
            $tickets = Ticket::all();
        } else if ($this->user('roles') == 'Technicien') {
            $assignments = Assignation::all();
            $tickets = 
            array_filter($assignments, function ($assg) {
                return ($assg['id_technicien'] == $this->user('id'));
            });
            $tickets = $tickets ?? [];
        } else {
            $tickets = Ticket::where('user_id', $this->user('id'));
        }

        $payloads = [
            'tickets' => $tickets,
            'technicians' => User::where('roles', 'Technicien'),
            'openedTickets' => array_filter($tickets, function ($k) {
                if (isset($k['ticket'])) {
                    return $k['ticket']['statut'] == 1;
                }
                return $k['statut'] == 1;
            }),
            'closedTickets' => array_filter($tickets, function ($k) {
                if (isset($k['ticket'])) {
                    return $k['ticket']['statut'] != 1;
                }
                return $k['statut'] == 0;
            }),
            'assignments' => Assignation::all()
        ];

        return $this->render('tickets/index', "Page de Gestion des tickets", $payloads);
    }

    public function create()
    {
        $payloads = [
            'departments' => Departement::all(),
        ];
        return $this->render('tickets/create', "Page de Creation d'un ticket", $payloads);
    }


    public function store()
    {
        $file = $this->file('fichier');

        $payloads = [
            'sujet' => $this->sanitize_post('sujet'),
            'appli' => $this->sanitize_post('appli'),
            'departement' => $this->sanitize_post('departement'),
            'statut' => $this->sanitize_post('statut'),
            'user_id' => $this->user('id')
        ];

        $file_path = $this->store_media($file, $payloads['sujet']);

        if (Ticket::create(array_merge($payloads, ['fichier' => $file_path]))) {

            return $this->redirecTo('/');
        }

        return $this->back()->with("Erreur de creation du ticket");
    }

    public function show(string $primary_key)
    {
        $data = Ticket::get($primary_key);

        if ($this->user('roles') == 'Admin') {
            $messages = Message::where('ticket', $primary_key);
        } else {
            $messages = Message::filter("user_id = {$this->user('id')} AND ticket = {$primary_key}");
        }

        return $this->render('tickets/show', "Voir le ticket", [
            'ticket' => $data,
            'messages' => $messages,
        ]);
    }

    public function edit(string $primary_key)
    {
        return $this->render('tickets/edit', "Editer un ticket", [
            'ticket' => Ticket::get($primary_key),
            'departments' => Departement::all(),
        ]);
    }

    public function update(string $primary_key)
    {
        $payloads = $this->posts();

        if (Ticket::update($primary_key, $payloads)) {
            return $this->redirecTo('/ticket/index');
        }

        return $this->back()->with("Erreur de mis à jour du ticket");
    }

    public function destroy(string $primary_key)
    {
        if (Ticket::delete($primary_key)) {
            return $this->back()->with("Votre ticket est bien supprimé", 'success');
        }

        return $this->back()->with("Erreur de suppression du ticket");
    }
}
