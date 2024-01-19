<?php

// La classe Pages gère les opérations liées aux pages de votre site web.
class Pages extends Controller 
{
    private $pageModel;
   
    // Le constructeur de la classe initialise le modèle de page.
    public function __construct() { 
        $this->pageModel = $this->model('Page');       
    }
    
    // Méthode pour afficher la page d'accueil du site.
    public function index()
    { 
        // Obtient la liste du contenu à afficher sur la page d'accueil.
        $contents = $this->pageModel->listContent();
        $data = [
            'contents' => $contents
        ];
        
        // Affiche la vue de la page d'accueil avec les données.
        $this->view('main/index', $data);
    }
    
    // Méthode pour afficher la page de gestion (réservée aux utilisateurs connectés).
    public function gestion(){
        // Vérifie si l'utilisateur est connecté.
        if(isLoggedIn() && $_SESSION["is_admin"]==1){
             $this->view('admin/gestion');
        } else {
            // Redirige vers la page d'accueil si l'utilisateur n'est pas connecté.
            header('location: ' . WWW_ROOT . 'pages/index');
        }
    }
}
