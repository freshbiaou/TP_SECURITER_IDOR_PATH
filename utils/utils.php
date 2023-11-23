<?php
session_start();
$current_user = $_SESSION['user'] ?? [];
class Utils
{
    /**
     * permet de recuperer tout le contenu de la variable globale $_POST echappés
     * @return array le contenu de la variable globale $_POST echappés
     */
    public function posts(): array
    {
        $posts = [];
        foreach ($_POST as $key => $post) {
            if (!empty($post)) {
                $posts[$key] = htmlentities($post);
            }
        }
        return $posts;
    }

    /**
     * permet de recuperer la valeur d'une clée soit dans le $_FILES
     * @param string $key 
     */
    public function file(string $key)
    {
        if (isset($_FILES[$key])) {
            $file = $_FILES[$key];

            if ($file['error'] == 0) {
                return $file;
            } else {
                return $erreur = "Le fichier n'a pas été correctement téléchargé.";
            }
        } else {
            return $erreur =  "La clé '$key' n'existe pas dans le tableau \$_FILES.";
        }
    }

    /**
     * Prends un chemin et redirige l'utilisateur vers ce chemin en utilisant la function native header
     */
    protected function redirecTo()
    {
        if (count($this->user()) > 1) {
            $to = 'index.php';
        } else {
            $to = 'login.php';
        }
        return header('Location: ' . $to);
    }

    /**
     * function permettant de valider les entrees par POST
     * @param string $path
     * @param string $option
     * @return string
     */
    protected function sanitize_post(string $key, bool $strict = true)
    {

        if ($strict) {

            if (!isset($_POST[$key]) || empty($_POST[$key])) {

                $erreur = "Le champs " . $key . " ne peut pas etre vide";

                //exit();
            }
            return htmlentities($_POST[$key]);
        }

        return htmlentities($_POST[$key]);
    }

    /**
     * redirect to previous page
     */
    protected function back()
    {
        $to = $_SERVER['HTTP_REFERER'] ?? 'index.php';
        //die("Hey !");
        header("Location: " . $to);
        return $this;
    }

    protected function with(string $message, $key = 'error')
    {
        $this->setDataOnSession($key, $message);

        return $this;
    }

    
    protected function user($attr = false)
    {

        return isset($_SESSION['user']) ?
            ($attr ? $_SESSION['user'][$attr] : $_SESSION['user']) : [];
    }

    public function store_media($file, string $newFileName): string
    {
        $path = 'Fichier_stocker' . DIRECTORY_SEPARATOR . $newFileName . '-' . date("Y-m-d-H-s-i") . '.' . pathinfo($file['name'])['extension'];

        if (move_uploaded_file($file['tmp_name'], $path)) {
            return $path;
        } else {
            $erreur = "Erreur d'importation du fichier";
            return '';
        }
    }

    static function setDataOnSession($key, $message)
    {
        return $_SESSION[$key] = $message;
    }

   
}
