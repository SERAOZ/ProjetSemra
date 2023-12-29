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
  
    public function register()
    {
        $data = [
           
            "username" => "",
            "password" => "",
            "email" => "",
            
        ];
      

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['inscrire']))
        {
            // Sanitize POST data
                $data = [
                "username" => $this ->valid_data($_POST["username"]),
                "password" => $this ->valid_data($_POST["password"]),
                "email" => $this ->valid_data($_POST["email"]),                
                ];

            if($this->userModel->findUserByEmail($data['email'])) 
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
         $this->view('users/register', $data);    
    }
    //Fonction qui permet à l’usager de se connecter
    public function connexion() {
        $data = [            
            'emailError' => ''
        ];

            //validation des post
        if(isset($_POST['submit'])) {
            
                /*on récupère la valeur email du formulaire et on y applique
                 les filtres de la fonction valid_data*/
                $email = $this-> valid_data($_POST["email"]);
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