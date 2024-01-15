<?php

// Définition de la classe Category, qui gère les opérations sur les catégories dans la base de données.
class Category {
    private $db;

    // Constructeur de la classe, initialisant la connexion à la base de données.
    public function __construct() {
        $this->db = new Database;
    }

    //Obtenir la liste des catégories triées par nom.
    public function listCategory(){
        $this->db->query("SELECT * FROM category ORDER BY name ASC");
        $categories = $this->db->resultSet();
        return $categories;
    }

    //Obtenir les détails d'une catégorie en fonction de son ID.
    public function oneCategory($id_category) {
        $this->db->query('SELECT * FROM category WHERE id_category = :id_category');
        $this->db->bind(':id_category', $id_category);
        $id_category = $this->db->single();
        return $id_category; 
    }

    //Ajouter une nouvelle catégorie à la base de données.
    public function addCategory($category) {
        $this->db->query('INSERT INTO category (name, description) VALUES (:name, :description)');

        // Associer les valeurs aux paramètres.
        $this->db->bind(':name', $category['name']);
        $this->db->bind(':description', $category['description']);              

        // Exécuter la requête d'insertion.
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Mettre à jour une catégorie existante dans la base de données.
    public function updateCategory($category){
        $this->db->query('UPDATE category SET name = :name, description = :description WHERE id_category = :id_category');
        $this->db->bind(':id_category', $category['id_category']);
        $this->db->bind(':name', $category['name']);
        $this->db->bind(':description', $category['description']);
               
        // Exécuter la requête de mise à jour.
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }         
    }

    //Supprimer une catégorie de la base de données en fonction de son ID.
    public function deleteCategory($id_category){
        $this->db->query('DELETE FROM category WHERE id_category = :id_category');
        $this->db->bind(':id_category', $id_category);
        
        // Exécuter la requête de suppression.
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
