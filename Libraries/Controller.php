<?php

// Cette classe de base permet de charger les modèles et les vues.
class Controller {
    
    // Méthode pour charger un modèle.
    public function model($model) {
        // Requiert le fichier du modèle correspondant.
        require_once (ROOT . 'models/' . $model . '.php');
        // Instancie le modèle.
        return new $model();
    }

    // Méthode pour charger une vue (et vérifie si elle existe).
    public function view($view, $data = []) {
        // Vérifie si le fichier de vue existe.
        if(file_exists(ROOT . 'views/' . $view . '.php')) {
            // Requiert le fichier de vue.
            require_once(ROOT . 'views/' . $view . '.php');
        } else {
            // Affiche une erreur 404 si la vue n'existe pas.
            die("404, la page n'existe pas.");
        }
    }
}

