<?php

class Pages extends Controller 
{
    private $pageModel;
   
    public function __construct() { 
        $this->pageModel = $this->model('Page');       
    }
    
    public function index()
    { 
    $contents = $this -> pageModel -> listContent();
            $data = [
                'contents'=>$contents
            ];
           
    $this->view('main/index', $data);
    }
    
    public function gestion(){
        if(isLoggedIn()){
             $this ->view('admin/gestion');
        }else{
            header('location: ' . WWW_ROOT . 'pages/index');
        }
       
    }



}

