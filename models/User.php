<?php

class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    public function inscription($data) {
              
        $this->db->query('INSERT INTO user (username, password, email, is_admin) VALUES(:username, :password, :email, :is_admin)');

        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':email', $data['email']);        
        $this->db->bind(':is_admin', '0');        
            
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM user WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function connexion($email, $password) {
        $this->db->query('SELECT * FROM user WHERE email = :email');

        //Bind 
        $this->db->bind(':email', $email);
       
        //méthode row comme objet de database
        $row = $this->db->single();
        if($row != FALSE){
            $hashedPassword = $row->password;

            if (password_verify($password, $hashedPassword) ) {
                return $row;
            } else {
                return false;
            }
        }else{return false;}
       
    }
}
?>