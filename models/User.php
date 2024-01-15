<?php

class User {
    private $db;

    // Constructeur de la classe User, initialise la connexion à la base de données.
    public function __construct() {
        $this->db = new Database;
    }

    // Méthode d'inscription d'un utilisateur avec un nom d'utilisateur, un email et un mot de passe.
    public function inscription($username, $email, $password) {
              
        $this->db->query('INSERT INTO users (username, password, email, is_admin) 
                          VALUES(:username, :password, :email, :is_admin)');

        // Associe les valeurs aux paramètres de la requête.
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);
        $this->db->bind(':email', $email);        
        $this->db->bind(':is_admin', 0);        
            
        // Exécute la requête.
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Méthode pour trouver un utilisateur par son email.
    public function findUserByEmail($email) {
        // Requête préparée
        $this->db->query('SELECT * FROM users WHERE email = :email');

        // Associe le paramètre :email avec la variable email.
        $this->db->bind(':email', $email);

        // Vérifie si l'email est déjà enregistré.
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Méthode de connexion de l'utilisateur avec son email et mot de passe.
    public function connexion($email, $password) {
        $this->db->query('SELECT * FROM users WHERE email = :email');

        // Associe le paramètre :email avec la variable email.
        $this->db->bind(':email', $email);
       
        // Récupère une seule ligne comme un objet de la base de données.
        $row = $this->db->single();
        if($row != FALSE){
            $hashedPassword = $row->password;

            // Vérifie si le mot de passe correspond au mot de passe haché stocké.
            if(password_verify($password, $hashedPassword) ) {
                return $row;
            }else{
                return false;
            }
        }else{
            return false;
        }
       
    }

    // Méthode pour obtenir la liste des utilisateurs triés par nom d'utilisateur.
    public function listUser(){
        $this->db->query("SELECT * FROM users ORDER BY username ASC");
        $users = $this->db->resultSet();
        return $users;
    }

    // Méthode pour obtenir les informations d'un utilisateur spécifique en fonction de son ID.
    public function oneUser($user_id) {
        $this->db->query('SELECT * FROM users WHERE user_id= :user_id');
        $this->db->bind(':user_id', $user_id);
        $user = $this->db->single();
        return $user; 
    }

    // Méthode pour mettre à jour les informations d'un utilisateur.
    public function updateUser($user_id, $username, $email, $password, $is_admin){
            
        $this->db->query('UPDATE users 
                        SET username= :username, email= :email, password = :password, is_admin = :is_admin 
                        WHERE user_id= :user_id');
                        
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);
        $this->db->bind(':email', $email); 
        $this->db->bind(':is_admin', $is_admin);
        $this->db->bind(':user_id', $user_id) ;      
            
        // Exécute la requête.
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Méthode pour supprimer un utilisateur en fonction de son ID.
    public function deleteUser($user_id){
    
        $this->db->query('DELETE FROM users WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}
