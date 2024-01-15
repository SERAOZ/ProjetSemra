<?php

// Définition de la classe Categories, qui agit comme le contrôleur pour les catégories.
class Categories extends Controller 
{
    // Propriété privée pour stocker le modèle de catégorie.
    private $categoryModel;
   
    // Constructeur de la classe Categories.
    public function __construct() { 
        $this->categoryModel = $this->model('category');       
    }

    // Fonction utilitaire pour valider les données entrées (nettoyer et sécuriser).
    public function valid_data($data){
        $data = trim($data); // Supprime les espaces en début et fin de chaîne.
        $data = stripslashes($data); // Supprime les slashes dans les textes.
        $data = htmlspecialchars($data); // Supprime les balises HTML comme "<>", etc.
        return $data;
    }

    // Fonction pour ajouter une nouvelle catégorie.
    public function addCategory (){        
        $category = [
            "name" => "",
            "description" => ""
        ];

        // Vérifie si le formulaire a été soumis en POST et si le bouton "add" a été cliqué.
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])){        
            $category = [
                "name" => $this->valid_data($_POST["name"]),
                "description" => $_POST["description"]
            ];                 
        
            // Ajoute la catégorie et redirige vers la liste des catégories.
            if($this->categoryModel->addCategory($category)) {
                header('location: ' . WWW_ROOT . 'categories/listCategory');
            } else {
                die('Erreur système.');
            }
        } else {
            $this->view('admin/addCategory');
        }            
    }

    // Fonction pour afficher la liste des catégories.
    public function listCategory(){

        // Vérifie si l'utilisateur est un administrateur.
        if($_SESSION["is_admin"] == 1 ){
            $categories = $this->categoryModel->listCategory();
            $data = [
                'categories' => $categories
            ];
            $this->view("admin/gestionCategory", $data);
        }       
    }

    // Fonction pour afficher les détails d'une seule catégorie.
    public function oneCategory($id_category){
        
        // Vérifie si l'utilisateur est un administrateur.
        if($_SESSION["is_admin"] == 1 ){
            $category = $this->categoryModel->oneCategory($id_category);
            $data = [
                'category' => $category
            ];
            $this->view("admin/oneCategory", $data);
        }
    }

    // Fonction pour afficher le formulaire de mise à jour d'une catégorie.
    public function formCategory($id_category){

        // Vérifie si l'utilisateur est un administrateur.
        if($_SESSION['is_admin'] == 1){
            $category = $this->categoryModel->oneCategory($id_category);
            $data = [
                'category' => $category
            ];
            $this->view('admin/formCategory', $data);
        }       
    }

    // Fonction pour mettre à jour une catégorie.
    public function updateCategory(){    
        $category = [
            "id_category" =>"",
            "name" => "",
            "description" => ""
        ];
        
        // Vérifie si le formulaire a été soumis en POST et si le bouton "edit" a été cliqué.
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])){        
            $category = [
                "id_category" => $_POST["id_category"],       
                "name" => $this->valid_data($_POST["name"]),
                "description" => $this->valid_data($_POST["description"])
            ]; 
                
            // Met à jour la catégorie et redirige vers la liste des catégories.
            if($this->categoryModel->updateCategory($category)) {                   
                header('location: ' . WWW_ROOT . 'categories/listCategory');
            } else {
                die('Erreur système.');
            }
        } else {             
            $this->view('main/index'); 
        }
    }

    // Fonction pour supprimer une catégorie.
    public function deleteCategory($id_category){    
        if($_SESSION["is_admin"] == 1 ){
            $this->categoryModel->deleteCategory($id_category);
            header("Location:" . WWW_ROOT . "categories/listCategory");
        }
    }
}
?>

