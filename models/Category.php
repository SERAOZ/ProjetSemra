<?php

class Category {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function listCategory(){
        $this ->db ->query ("SELECT * from category order by name ASC");
        $categories = $this-> db -> resultSet();
        return $categories;
    }

    public function oneCategory($id_category) {
        $this->db->query('SELECT * FROM category WHERE id_category= :id_category');
        $this->db->bind(':id_category', $id_category);
        $id_category=$this->db->single();
        return $id_category; 
    }

    public function addCategory($category) {
        
        $this->db->query('INSERT INTO category (name, description) 
        VALUES(:name, :description)');

        //Bind values
            $this->db->bind(':name', $category['name']);
            $this->db->bind(':description', $category['description']);              
               
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCategory($category){
            
        $this->db->query('UPDATE category SET name= :name, description= :description WHERE id_category= :id_category');
       
        $this->db->bind(':name', $category['name']);
        $this->db->bind(':description', $category['description']);
               
            //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }         
    }

    public function deleteCategory($id_category){
    
        $this->db->query('DELETE FROM category WHERE id_category = :id_category');
        $this->db->bind('id_category', $id_category);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
