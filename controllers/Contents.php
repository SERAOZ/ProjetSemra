<?php

// La classe Contents gère les opérations liées au contenu sur le site web.
class Contents extends Controller 
{
    
    private $contentModel;
    private $categoryModel;
   
    // Constructeur de la classe Contents, initialisant les modèles pour le contenu et les catégories.
    public function __construct() { 
        $this->contentModel = $this->model('content');
        $this->categoryModel = $this->model('category');      
    }

    // Fonction utilitaire pour valider les données entrées (nettoyer et sécuriser).
    public function valid_data($data){
        $data = trim($data); // Supprime les espaces en début et fin de chaîne.
        $data = stripslashes($data); // Supprime les slashes dans les textes.
        $data = htmlspecialchars($data); // Supprime les balises HTML comme "<>", etc.
        return $data;
    }

    // Fonction pour ajouter un nouveau contenu.
    public function addContent (){
        $now =  new DateTime('now');
        $date = $now->format('Y-m-d H:i:s');
        
        $content = [
            "title" => "",
            "content_text" => "",
            "publicationDate" => "",
            "id_category" => ""
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])){        
            $content = [
                "title" => $this->valid_data($_POST["title"]),
                "content_text" => $_POST["content_text"],
                "publicationDate" => $date,
                "id_category" => $_POST["id_category"]
            ];                 
        
            if($this->contentModel->addContent($content)) {
                header('location: ' .WWW_ROOT.'contents/listContent');
            } else {
                die('Erreur système.');
            }
        } else { 
            $categories = $this->categoryModel->listCategory();
            $data = [
                'categories' => $categories
            ];               
            $this->view('admin/addContent', $data);
        }            
    }

    // Fonction pour afficher la liste des contenus.
    public function listContent(){

        if($_SESSION["is_admin"] == 1 ){
            $contents = $this->contentModel->listContent();
            $data = [
                'contents' => $contents
            ];
            $this->view("admin/gestionContent", $data);
        }       
    }

    // Fonction pour afficher les détails d'un contenu spécifique.
    public function oneContent($id_content){
        
        if($_SESSION["is_admin"] == 1 ){
            $content = $this->contentModel->oneContent($id_content);
            $data = [
                'content' => $content
            ];
            $this->view("admin/oneContent", $data);
        }
    }

   // Fonction pour afficher le formulaire de mise à jour d'un contenu.
   public function formContent($id_content){

        if($_SESSION['is_admin'] == 1){
            $content = $this->contentModel->oneContent($id_content);
            $categories = $this->categoryModel->listCategory();
            $data = [
                'content' => $content,
                'categories' => $categories
            ];
            $this->view('admin/formContent', $data);
        }       
   }

   // Fonction pour mettre à jour un contenu existant.
   public function updateContent(){  
        $now =  new DateTime('now');
        $date = $now->format('Y-m-d H:i:s');
      
        $content = [
            "id_content" =>"",
            "title" => "",
            "content_text" => "",
            "publicationDate" => "",
            "id_category" => ""
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])){        
            $content = [
                "id_content" => $_POST["id_content"],     
                "title" => $this->valid_data($_POST["title"]),
                "content_text" => $this->valid_data($_POST["content_text"]),
                "publicationDate" => $date,
                "id_category" => $_POST["id_category"]
            ]; 
                
            if($this->contentModel->updateContent($content)) {                   
                header('location: ' .WWW_ROOT.'contents/listContent');
            } else {
                die('Erreur système.');
            }
        } else {             
            $this->view('main/index'); 
        }
   }

   // Fonction pour supprimer un contenu.
   public function deleteContent($id_content){    
        if($_SESSION["is_admin"] == 1 ){
            $this->contentModel->deleteContent($id_content);
            header("Location:" . WWW_ROOT . "contents/listContent");
        }
   }
}
