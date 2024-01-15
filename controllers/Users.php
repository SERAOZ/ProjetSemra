<?php

// La classe Users gère les opérations liées aux utilisateurs sur votre site web.
class Users extends Controller 
{   
    private $userModel;
   
    // Le constructeur de la classe initialise le modèle d'utilisateur.
    public function __construct() { 
        $this->userModel = $this->model('user');       
    }
    
    // Fonction utilitaire pour valider les données entrées (nettoyer et sécuriser).
    public function valid_data($data){
        $data = trim($data); // Supprime les espaces en début et fin de chaîne.
        $data = stripslashes($data); // Supprime les slashes dans les textes.
        $data = htmlspecialchars($data); // Supprime les balises HTML comme "<>", etc.
        return $data;
    }
  
    // Méthode pour gérer l'inscription d'un utilisateur.
    public function register() {
                
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {                       
            $username = $this->valid_data($_POST["username"]);
            $email = $_POST["email"];
            $password = $this->valid_data($_POST["password"]);
            $success = '';
            $username_error = '';
            $email_error = '';
            $password_error = '';
            
            if(empty($username))
            {
                $username_error = 'Username is Required';
            }
            // Valider l'adresse e-mail.
            if(empty($email)) {
                $email_error = 'Email is required.';
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_error = 'Please enter the correct format.';
            } 
            if($this->userModel->findUserByEmail($email)) {
                $email_error = 'Email is already taken.';
            }    
            if(empty($password))
            {
                $password_error = 'Password is Required';
            }            
            if($username_error == '' && $email_error == '' && $password_error == '') {                
                // Hacher le mot de passe.
                $password = password_hash($password, PASSWORD_DEFAULT);
    
                if($this->userModel->inscription($username, $email, $password)) {
                    $success = '<div class="alert alert-success">Vous êtes inscrit(e)</div>';      
                } else {
                    $success = '<div class="alert alert-success">Erreur d\'inscription, veuillez réessayer</div>';
                }                
            }
            $output = array(
                'success' => $success,
                'username_error' => $username_error,
                'email_error' => $email_error,
                'password_error' => $password_error,
            );

            echo json_encode($output);
        } else {
            $this->view('users/register');    
        }                 
    }   
   
    // Méthode pour gérer la connexion d'un utilisateur.
    public function connexion() {
        // Validation des données de formulaire POST.
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            /*on récupère la valeur email du formulaire et on y applique
            les filtres de la fonction valid_data*/
            $email = $this->valid_data($_POST["email"]);
            $password = $this->valid_data($_POST["password"]);
            $success = '';
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
                } else {
                    $success = '<div class="alert alert-success">Mauvaise adresse e-mail ou mot de passe. Êtes-vous déjà inscrit(e) ?</div>';  
                }          
            }
            
            $output = array(
                'success' => $success,
                'email_error' => $email_error,
                'password_error' => $password_error,
            );
            
            echo json_encode($output);         
        } else {
            $this->view('users/connexion');    
        }
    }
    
    // Fonction pour créer une session utilisateur.
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

    // Méthode pour se déconnecter (détruit la session).
    public function logout() {       
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['is_admin']);
       
        header('location:' . WWW_ROOT . 'users/connexion');
    }

    // Méthode pour afficher la liste des utilisateurs (réservée aux administrateurs).
    public function listUser(){

        if($_SESSION["is_admin"] == 1 ){
            $users = $this->userModel->listUser();
            $data = [
                'users' => $users
            ];
            $this->view("admin/gestionUser", $data);
        }       
    }

    // Méthode pour afficher les détails d'un utilisateur spécifique (réservée aux administrateurs ou à l'utilisateur lui-même).
    public function oneUser($user_id){
        
        if($_SESSION['is_admin'] == 1 || $_SESSION['user_id'] == $user_id){
            $user = $this->userModel->oneUser($user_id);
            $data = [
                'user' => $user
            ];
            $this->view("admin/oneUser", $data);
        }
    }

   // Méthode pour afficher le formulaire de mise à jour d'un utilisateur (réservée aux administrateurs ou à l'utilisateur lui-même).
   public function formUser($user_id){

        if($_SESSION['is_admin'] == 1 || $_SESSION['user_id'] == $user_id){
            $user = $this->userModel->oneUser($user_id);
            $data = [
                'user' => $user
            ];
            $this->view('admin/formUser', $data);
        }       
   }

   // Méthode pour supprimer un utilisateur (réservée aux administrateurs).
   public function deleteUser($user_id){    
        if($_SESSION["is_admin"] == 1 ){
            $this->userModel->deleteUser($user_id);
            header("Location:" . WWW_ROOT . "users/listUser");
        }
   }

   // Méthode pour mettre à jour les informations d'un utilisateur.
   public function updateUser() {
                
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user_id = $_POST["user_id"];                       
        $username = $this->valid_data($_POST["username"]);
        $email = $_POST["email"];
        $password = $this->valid_data($_POST["password"]);
        $is_admin = $_POST["is_admin"];
        $success = '';
        $username_error = '';
        $email_error = '';
        $password_error = '';
        $is_admin_error = '';
        
        if(empty($username))
        {
            $username_error = 'Username is Required';
        }
        // Valider l'adresse e-mail.
        if(empty($email)) {
            $email_error = 'Email is required.';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = 'Please enter the correct format.';
        } 
        if($this->userModel->findUserByEmail($email)) {
            $email_error = 'Email is already taken.';
        }    
        if(empty($password))
        {
            $password_error = 'Password is Required';
        }
        if($is_admin === "")
        {
            $is_admin_error = 'Admin is Required';
        }            
        if($username_error == '' && $email_error == '' && $password_error == '' && $is_admin_error == '') {                
            // Hacher le mot de passe.
            $password = password_hash($password, PASSWORD_DEFAULT);

            if($this->userModel->updateUser($user_id, $username, $email, $password, $is_admin)) {
                $success = '<div class="alert alert-success">Les informations ont été mises à jour</div>';      
            } else {
                $success = '<div class="alert alert-success">Erreur lors de la mise à jour des informations, veuillez réessayer</div>';
            }                
        }
        $output = array(
            'success' => $success,
            'username_error' => $username_error,
            'email_error' => $email_error,
            'password_error' => $password_error,
            'is_admin_error' => $is_admin_error
        );

        echo json_encode($output);
    } else {
        $this->view('admin/formUser');    
    }                 
}
}
