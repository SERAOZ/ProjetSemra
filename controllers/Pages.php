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
        $this ->view('admin/gestion');
    }
}

