<?php

require_once('utils/utils.php');
class Controller extends Utils
{
    /**
     * retourne une vue
     * @param string $viewPath
     * @return array full view path or 404 view path with context globale data
     */
    public function render($view, $title = '', $context = null)
    {
        $view  = '404.php';
        $view = file_exists($view) ? $view : '404.php';

        return [
            'view_path' => $view,
            'context' => $context ?? [],
            'title' => $title
        ];
    }

    public function can(array $user_type = null)
    {
        $this->mustAuthenticate();

        $user_type = $user_type ?? ['Admin', 'Technicien', 'Client'];

        $user_role = $this->user('roles');

        foreach ($user_type as $role) {
            if ($user_role === $role) return;
        }

        return $erreur = "Access Denied to this Ressource";
    }

    public function mustAuthenticate(bool $statut = true)
    {
        if ($statut) {
            count($this->user()) ? null : $this->redirecTo();
        } else {
            !count($this->user()) ? null : $this->redirecTo();
        }
    }
}
