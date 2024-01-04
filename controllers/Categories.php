<?php

class Categories extends Controller 
{
    
    private $categoryModel;
   
    public function __construct() { 
        $this->categoryModel = $this->model('categoryModel');       
    }
    public function valid_data($data){
        $data = trim($data);//enlève les espaces en début et fin de chaîne/
        $data = stripslashes($data);//enlève les slashs dans les textes/
        $data = htmlspecialchars($data);/*enlève les balises html comme ""<>...*/
        return $data;
    }
    public function addCategory (){
        
        $category = [
            "name" => "",
            "description" => ""
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])){        
            $category = [
            "name" => $this-> valid_data ($_POST["name"]),
            "description" => $this ->valid_data($_POST["description"])
            ];                 
        
        if($this->categoryModel->addCategory($category)) {
            header('location: ' . WWW_ROOT . 'admin/crudCategory');
            } else {
            die('Erreur système.');
            }
            }else{
                
                $this->view('admin/addCategory');}            
    }

    public function listCategory(){

        if($_SESSION["is_admin"] ==1 ){
            $categories = $this -> categoryModel -> listCategory();
            $data = [
                'categories'=>$categories
            ];
            $this->view("admin/listCategory", $data);
        }       
    }

    public function oneCategory($id_category){
        
        if($_SESSION["is_admin"] ==1 ){
            $category = $this ->categoryModel->oneCategory($id_category);
            $data = [
            'category'=>$category
            ];
            $this-> view("admin/oneCategory", $data);
        }
    }

   public function formCategory($id_category){

        if($_SESSION['is_admin']==1){
            $category = $this ->categoryModel->oneCategory($id_category);
            $data = [
            'category'=>$category
            ];
            $this->view('admin/formCategory', $data);
        }       
   }

   public function updateCategory(){    
        $category = [
            "name" => "",
            "description" => ""
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])){        
            $category = [
            "name" => $this-> valid_data ($_POST["name"]),
            "description" => $this ->valid_data($_POST["description"])
            ]; 
                
            if($this->categoryModel->updateCategory($category)) {                   
                header('location: ' . WWW_ROOT . 'admin/crudCategory');
                } else {
                die('Erreur système.');
                }
                }else{             
                $this->view('pages/index'); 
            }
   }

   public function deleteCategory($id_category){    
        if($_SESSION["is_admin"] ==1 ){
            $this -> categoryModel -> deleteCategory($id_category);
            header("Location:" . WWW_ROOT . "admin/crudCategory");
        }
   }

}
?>