<?php
require_once('Controller.php');
require_once('models/Message.php');

class MessageController extends Controller
{

    public function store()
    {
        $success = null;
        $erreur = null;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $payloads = [
                'messages' => $this->sanitize_post('messages'),
                'produit' => $this->sanitize_post('users_id'),
            ];

            if (Message::create(array_merge($payloads, ['user_id' => $this->user('id')]))) {

                 $success = "Votre message est bien crée avec success";
            }

             $erreur = "Erreur de creation du message";
        }
        return ['success' => $success, 'erreur' => $erreur];
    }

    public function destroy(string $primary_key)
    {
        $success = null; $erreur = null;
        if (Message::delete($primary_key)) {
            return $success = "Votre message est bien supprimé avec success";
        }
        return $erreur = "Erreur de suppression du message";
    }
}
