<?php

class Pages extends Controller 
{
    private $pageModel;
   
    public function __construct() { 
        $this->pageModel = $this->model('Page');       
    }
    
    public function index()
    { 
    $this->view('main/index');
    } 
    
    public function gestion(){
        if(isLoggedIn()){
             $this ->view('admin/gestion');
        }else{
            header('location: ' . WWW_ROOT . 'pages/index');
        }
       
    }

}

