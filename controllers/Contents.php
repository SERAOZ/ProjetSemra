<?php
class Contents extends Controller 
{
    
    private $contentModel;
   
    public function __construct() { 
        $this->contentModel = $this->model('content');       
    }
    public function valid_data($data){
        $data = trim($data);//enlève les espaces en début et fin de chaîne/
        $data = stripslashes($data);//enlève les slashs dans les textes/
        $data = htmlspecialchars($data);/*enlève les balises html comme ""<>...*/
        return $data;
    }
    public function addContent (){
        $now =  new DateTime('now');
        $date = $now->format('Y-m-d H:i:s');
        
        $content = [
            "title" => "",
            "content_text" => "",
            "publicationDate" => ""
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])){        
            $content = [
            "title" => $this-> valid_data ($_POST["title"]),
            "content_text" => $_POST["content_text"],
            "publicationDate" =>$date

            ];                 
        
        if($this->contentModel->addContent($content)) {
            header('location: ' . WWW_ROOT . 'contents/listContent');
            } else {
            die('Erreur système.');
            }
            }else{                
                $this->view('admin/addContent');}            
    }

    public function listContent(){

        if($_SESSION["is_admin"] ==1 ){
            $contents= $this -> contentModel -> listContent();
            $data = [
                'contents'=>$contents
            ];
            $this->view("admin/gestionContent", $data);
        }       
    }

    public function oneContent($id_content){
        
        if($_SESSION["is_admin"] ==1 ){
            $content = $this ->contentModel->oneContent($id_content);
            $data = [
            'content'=>$content
            ];
            $this-> view("admin/oneContent", $data);
        }
    }

   public function formContent($id_content){

        if($_SESSION['is_admin']==1){
            $content = $this ->contentModel->oneContent($id_content);
            $data = [
            'content'=>$content
            ];
            $this->view('admin/formContent', $data);
        }       
   }

   public function updateContent(){  
    $now =  new DateTime('now');
    $date = $now->format('Y-m-d H:i:s');
      
        $content = [
            "title" => "",
            "content_text" => "",
            "publicationDate" => ""
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])){        
            $content = [
            "title" => $this-> valid_data ($_POST["title"]),
            "content_text" => $this ->valid_data($_POST["context_text"]),
            "publicationDate" => $date
            ]; 
                
            if($this->contentModel->updateContent($content)) {                   
                header('location: ' . WWW_ROOT . 'contents/listContent');
                } else {
                die('Erreur système.');
                }
                }else{             
                $this->view('pages/index'); 
            }
   }

   public function deleteContent($id_content){    
        if($_SESSION["is_admin"] ==1 ){
            $this -> contentModel -> deleteContent($id_content);
            header("Location:" . WWW_ROOT . "contents/listContent");
        }
   }

}
?>