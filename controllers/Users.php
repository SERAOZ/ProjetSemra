<?php

class Users extends Controller 
{   
    private $userModel;
   
    public function __construct() { 
        $this->userModel = $this->model('user');       
    }
    public function valid_data($data){
        $data = trim($data);//enlève les espaces en début et fin de chaîne/
        $data = stripslashes($data);//enlève les slashs dans les textes/
        $data = htmlspecialchars($data);/*enlève les balises html comme ""<>...*/
        return $data;
    }
  
    public function register() {
                
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {                       
            $username=$this->valid_data($_POST["username"]);
            $email = $_POST["email"];
            $password = $this->valid_data($_POST["password"]);
            $success= '';
            $username_error='';
            $email_error = '';
            $password_error = '';
            
            if(empty($username))
            {
                $username_error = 'Username is Required';
            }
            // Validate email
            if(empty($email)) {
                $email_error= 'Email is required.';
            }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_error = 'Please enter the correct format.';
            } 
            if($this->userModel->findUserByEmail($email)) {
                $email_error = 'Email is already taken.';
            }    
            if(empty($password))
            {
                $password_error = 'Password is Required';
            }            
            if($username_error=='' && $email_error == '' && $password_error == ''){                
                // Hash password
                $password= password_hash($password, PASSWORD_DEFAULT);
    
            if($this->userModel->inscription($username, $email, $password)) {
                $success = '<div class="alert alert-success">Vous êtes inscrit(e)</div>';      
            }else {
                $success = '<div class="alert alert-success">Erreur d\'inscription, veuillez recommencer</div>';
            }                
            }
            $output = array(
                'success'		=>	$success,
                'username_error'=> $username_error,
                'email_error'	=>	$email_error,
                'password_error'=>	$password_error,
            );

        echo json_encode($output);
        }else{
        $this->view('users/register');    
        }                 
    }   
    public function connexion() {
        //validation des post
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            /*on récupère la valeur email du formulaire et on y applique
                les filtres de la fonction valid_data*/
            $email = $this->valid_data($_POST["email"]);
            $password = $this->valid_data($_POST["password"]);
            $success= '';
            $email_error = '';
            $password_error = '';
            if(empty($email))
            {
                $email_error = 'Email is Required';
            }
            else
            {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $email_error = 'Email is invalid';
                }
            }

            if(empty($password))
            {
                $password_error = 'Password is Required';
            }
            if($email_error == '' && $password_error == ''){
                $loggedInUser = $this->userModel->connexion($email, $password);
            
            if($loggedInUser == true ) {
                $this->createUserSession($loggedInUser);    
                $success = '<div class="alert alert-success">Vous êtes connecté(e)</div>';      
            }else{
                $success = '<div class="alert alert-success">Mauvais email ou password. Êtes vous déja inscrit(e)?</div>';  
            }          
            }
            $output = array(
                    'success'		=>	$success,
                    'email_error'	=>	$email_error,
                    'password_error'=>	$password_error,
            );
            echo json_encode($output);         
        }else{
           $this->view('users/connexion');    
        }
    }
    //Fonction qui crée une session 
    public function createUserSession($user) {
      
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;

        if($user->is_admin == 1){
           $_SESSION['is_admin'] = 1;
          
        }else{
            $_SESSION['is_admin'] = 0;     
        }        
        
    }

    public function logout() {       
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['is_admin']);
       
        header('location:' . WWW_ROOT . 'users/connexion');
    }
}