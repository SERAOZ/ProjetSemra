<?php

class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    public function inscription($username, $email, $password) {
              
        $this->db->query('INSERT INTO users (username, password, email, is_admin) VALUES(:username, :password, :email, :is_admin)');

        //Bind values
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);
        $this->db->bind(':email', $email);        
        $this->db->bind(':is_admin', 0);        
            
        //Execute function
        if($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }
    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        }else {
            return false;
        }
    }
    public function connexion($email, $password) {
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Bind 
        $this->db->bind(':email', $email);
       
        //méthode row comme objet de database
        $row = $this->db->single();
        if($row != FALSE){
            $hashedPassword = $row->password;

            if(password_verify($password, $hashedPassword) ) {
                return $row;
            }else{
                return false;
            }
        }else{return false;}
       
    }

    public function listUser(){
        $this ->db ->query ("SELECT * from users order by username ASC");
        $users = $this-> db -> resultSet();
        return $users;
    }

     public function oneUser($user_id) {
        $this->db->query('SELECT * FROM users WHERE user_id= :user_id');
        $this->db->bind(':user_id', $user_id);
        $user=$this->db->single();
        return $user; 
    }
    public function updateUser($username, $email, $password, $is_admin){
            
        $this->db->query('UPDATE users SET username= :username, email= :email, password = :password, is_admin = :is_admin WHERE user_id= :user_id');
         $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);
        $this->db->bind(':email', $email); 
        $this->db->bind(':is_admin', $is_admin);       
            //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }         
    }

     public function deleteUser($user_id){
    
        $this->db->query('DELETE FROM users WHERE user_id = :user_id');
        $this->db->bind('user_id', $user_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}
?>