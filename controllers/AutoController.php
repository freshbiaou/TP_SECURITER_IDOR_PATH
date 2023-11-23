<?php

require_once('Controller.php');
require_once('models/User.php');

class AuthController extends Controller
{
      /**
     * Function de login
     */
    public function login()
    {
       $this->mustAuthenticate(false);
       
        $erreur = null;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = $this->sanitize_post('email');
            $password = $this->sanitize_post('pass');

            if ($user = User::getBy('email', $email)) {
                if (password_verify($password, $user['pass'])) {
                    $this::setDataOnSession('user', $user);
                    return $this->redirecTo();
                } else {
                    $erreur = "Votre Mot de passe est incorrect...";
                }
            } else {
                $erreur= "Votre email est incorrect...";
            }
        }  
        
        return $erreur;     
    }
   
    public function register()
    {
        $erreur = null;
        $this->mustAuthenticate(false);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $payloads = [
                'first_name' => $this->sanitize_post('first_name'),
                'last_name' => $this->sanitize_post('last_name'),
                'email' => $this->sanitize_post('email'),
                'pass' => password_hash($this->sanitize_post('pass'), PASSWORD_DEFAULT),
            ];

            if (password_verify($this->sanitize_post('conf'), $payloads['pass'])) {
                if ($user = User::create($payloads)) {
                    $new_user = User::getBy('email', $payloads['email']);
                    $this::setDataOnSession('user', $new_user);
                    return $this->redirecTo();
                }
            } else {
               return $erreur = "Vos deux mots de passe ne sont pas conformes";
            }
        }

    }

    public function password()
    {
        $this->mustAuthenticate();
        $erreur = null;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $lastPassword = $this->sanitize_post('lastPassword');
            $newPassword = $this->sanitize_post('newPassword');
            $confirm = $this->sanitize_post('confirmPassword');

            if(password_verify($lastPassword, $this->user('pass'))) {
                if(hash_equals($newPassword, $confirm)) {
                    $payload = ['pass' => password_hash($newPassword, PASSWORD_DEFAULT)];

                    if(User::update($this->user('id'), $payload)) {
                        return $this->redirecTo();
                    }
                    $erreur = "Erreur de changement";
                }
                 $erreur = "Vos deux mots de passe ne sont pas conforme";
            }
              $erreur = "Votre ancien mot de passe est incorrect";
        } 
        return $erreur;
    }

    
    public function edit(string $primary_key)
    {
        return [
            'users' => User::get($primary_key),
        ];
    }

    public function update(string $primary_key)
    {
        $erreur = null;
        $success = null;
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $payloads = $this->posts();
            
            if (User::update($primary_key, $payloads)) {
                if ($primary_key == $this->user('id')) {
                    $user = User::get($primary_key);
                    $this::setDataOnSession('user', $user);
                }
                 $success = "L'Utilisateur à été bien mis à jour";
            }else
            {
                $erreur = "Erreur de mis à jour de L'Utilisateur";
            }
        } 
        return ['success' => $success, 'erreur' => $erreur];
    }



}
