<?php

require_once('Controller.php');
require_once('models/Produit.php');


class ProduitController extends Controller
{
  /* 
    cette function renvoie l'ensemble des Produits 
*/
    public function index(string $primary_key)
    {
        $payloads = [
            'produit' => Produit::where('user_id', $primary_key),
        ];
        return $payloads;
    }

    public function show(string $primary_key)
    {
        $data = Produit::get($primary_key);

        $messages = Produit::where('user_id', $primary_key);
        
        return [
            'produit' => $data,
            'Users' => $messages,
       ];
    }

    public function store()
    {
        $erreur = null;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $payloads = [
                'name' => $this->sanitize_post('name'),
                'full_name' => $this->sanitize_post('full_name'),
                'email' => $this->sanitize_post('email'),
                'choix' => $this->sanitize_post('choix'),
                'message' => $this->sanitize_post('message'),
                'user_id' => $this->user('id')
            ];

            if (Produit::create($payloads)) {

                return $this->redirecTo();
            }

             $erreur = "Erreur de creation du Departement";
        }
        return $erreur;
    }

    public function edit(string $primary_key, string $userId)
    {
        return [
            'produit' => Produit::filter("id=" . $primary_key . " AND user_id=" . $userId),
        ];    
    }

    public function update(string $primary_key)
    {
        $erreur = null; $success = null;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $payloads = $this->posts();

        if (Produit::update($primary_key, $payloads)) {
            return header('Location: index.php');
        }

         $erreur = "Erreur de mis à jour du Departement";
        }
        return ['success' => $success, 'erreur' => $erreur];
    }

    public function destroy(string $primary_key, string $userId)
    {
        $erreur = null;$success = null;

        $produit = Produit::get($primary_key);
        if($produit['user_id'] == $userId &&  Produit::delete($primary_key)){
            return header("Location:index.php");
        }
        return $erreur = "Erreur de suppression du Produit";
    }

}
