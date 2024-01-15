<?php
// Définit une constante contenant le chemin vers la racine du projet
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

// Définit une constante contenant l'URL de la racine du site web
define("WWW_ROOT", rtrim($_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . '/'));

/**
 * Appelle les bibliothèques et les assistants nécessaires pour le fonctionnement de l'application
 */
require_once(ROOT . 'libraries/Controller.php'); // Inclut le contrôleur de base
require_once(ROOT . 'libraries/Database.php'); // Inclut la classe de base de données
require_once(ROOT . 'helpers/session_helper.php'); // Inclut des fonctions d'aide pour la gestion des sessions
require_once(ROOT . 'helpers/printr_helper.php'); // Inclut des fonctions d'aide pour le débogage

// Sépare les paramètres de l'URL et les place dans un tableau $params
$params = explode('/', $_GET['p']);

// Si au moins 1 paramètre est défini dans l'URL
if ($params[0] != "") {
    // Le premier paramètre de l'URL est utilisé comme nom du contrôleur en capitalisant sa première lettre
    $controller = ucfirst($params[0]);

    // Le deuxième paramètre de l'URL est utilisé comme nom de l'action, s'il existe, sinon c'est 'index'
    $action = isset($params[1]) ? $params[1] : 'index';

    // Nous incluons le fichier du contrôleur correspondant
    require_once(ROOT . 'controllers/' . $controller . '.php');

    // Instancie le contrôleur correspondant
    $controller = new $controller();

    // Vérifie si la méthode (action) existe dans le contrôleur
    if (method_exists($controller, $action)) {
        // Supprime les deux premiers éléments du tableau $params (nom du contrôleur et nom de l'action)
        unset($params[0]);
        unset($params[1]);

        // Appelle la méthode (action) avec les paramètres restants
        call_user_func_array([$controller, $action], $params);
    } else {
        // Si la méthode (action) n'existe pas, renvoie une réponse HTTP 404
        http_response_code(404);
        echo "La page recherchée n'existe pas";
    }
} else {
    // Si aucun paramètre n'est défini dans l'URL, cela signifie que l'utilisateur accède à la page d'accueil

    // Nous incluons le fichier du contrôleur de page par défaut
    require_once(ROOT . 'controllers/Pages.php');

    // Instancie le contrôleur de page par défaut
    $controller = new Pages();

    // Appelle la méthode par défaut (index) du contrôleur de page
    $controller->index();
}
