<?php

class Users extends Controller 
{
    private $userModel;
   
    public function __construct() { 
        $this->userModel = $this->model('user');       
    }
  
    public function register()
    {
        $data = [
            "user_id" => "",
            "username" => "",
            "password" => "",
            "email" => "",
            "is_admin" => ""
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['inscrire']))
        {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                "user_id" => $_SESSION ["user_id"],
                "username" => trim($_POST["username"]),
                "password" => trim($_POST["password"]),
                "email" => trim($_POST["email"]),
                "is_admin" => trim($_POST["is_admin"])
            ];

            if($_SESSION['email']!= $data['email'] && $this->userModel->findUserByEmail($data['email'])) 
            {
                $data['emailError'] = 'Cet email est déja utilisé.';
            } 

            if (empty($data['emailError'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //enregistre utilisateur
                if ($this->userModel->inscription($data)) {
                    //Redirect page connexion
                    header('location: ' . WWW_ROOT . 'users/connexion');
                } else {
                    die('Erreur systéme.');
                }
            }
         }    
    }
    //Fonction qui permet à l’usager de se connecter
    public function connexion() {
        $data = [            
            'emailError' => ''
        ];

        function valid_data($data){
            $data = trim($data);//enlève les espaces en début et fin de chaîne/
            $data = stripslashes($data);//enlève les slashs dans les textes/
            $data = htmlspecialchars($data);/*enlève les balises html comme ""<>...*/
            return $data;
        }

        //validation des post
        if(isset($_POST['submit'])) {
            
                /*on récupère la valeur email du formulaire et on y applique
                 les filtres de la fonction valid_data*/
                $email = valid_data($_POST["email"]);
                $password = $_POST["password"];
 
                $loggedInUser = $this->userModel->connexion($email, $password);
               
                if ($loggedInUser == false ) {
                    $data['emailError']= 'Le mot de passe ou l\'email sont incorrects ou vous n\'êtes pas encore inscrit.' ;
                    $this->view('users/connexion', $data);              
                }else{
                    //ouvre une session si le user est bien dans la table user (email, pass)
                    $this->createUserSession($loggedInUser);
                } 

        } else {
            $data = ['emailError' => ''];
        $this->view('users/connexion', $data);
        }
    }
    //Fonction qui crée une session 
    public function createUserSession($user) {
      
        $_SESSION['id_user'] = $user->id_user;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;

         if ($user->is_admin == 1){
           $_SESSION['is_admin'] = 1;
           header('location:' . WWW_ROOT . 'pages/index');
       }else{
            $_SESSION['is_admin'] = 0;
           
           header('location:' . WWW_ROOT . 'pages/index');
       }        
        
    }

    public function logout() {
       
        unset($_SESSION['id_user']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['is_admin']);
       
        header('location:' . WWW_ROOT . 'users/connexion');
    }
}