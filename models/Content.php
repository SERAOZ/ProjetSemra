<?php

class Content {
    private $db;
    
    // Constructeur de la classe Content, initialise la connexion à la base de données.
    public function __construct() {
        $this->db = new Database;
    }

    // Récupère la liste de tous les contenus avec leurs catégories associées, triée par titre.
    public function listContent(){
        $this->db->query("SELECT * FROM content INNER JOIN category 
        ON content.id_category = category.id_category ORDER BY title ASC");
        $contents = $this->db->resultSet();
        return $contents;
    }

    // Récupère un contenu spécifique en fonction de son ID, avec sa catégorie associée.
    public function oneContent($id_content) {
        $this->db->query('SELECT * FROM content INNER JOIN category 
        ON content.id_category = category.id_category WHERE id_content = :id_content');
        $this->db->bind(':id_content', $id_content);
        $content = $this->db->single();
        return $content; 
    }

    // Ajoute un nouveau contenu avec son titre, son texte, sa date de publication et son ID de catégorie.
    public function addContent($content) {
        $this->db->query('INSERT INTO content (title, content_text, publicationDate, id_category) 
        VALUES(:title, :content_text, :publicationDate, :id_category)');

        // Lie les valeurs
        $this->db->bind(':title', $content['title']);
        $this->db->bind(':content_text', $content['content_text']);
        $this->db->bind(':publicationDate', $content['publicationDate']);
        $this->db->bind(':id_category', $content['id_category']);               
               
        // Exécute la requête
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Met à jour un contenu existant avec son titre, son texte, sa date de publication et son ID de catégorie.
    public function updateContent($content){
        $this->db->query('UPDATE content 
        SET title = :title, content_text = :content_text, publicationDate = :publicationDate, id_category = :id_category 
        WHERE id_content = :id_content');
        
        $this->db->bind(':id_content', $content['id_content']);
        $this->db->bind(':title', $content['title']);
        $this->db->bind(':content_text', $content['content_text']);
        $this->db->bind(':publicationDate', $content['publicationDate']);
        $this->db->bind(':id_category', $content['id_category']);  
               
        // Exécute la requête
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }         
    }

    // Supprime un contenu en fonction de son ID.
    public function deleteContent($id_content){
        $this->db->query('DELETE FROM content WHERE id_content = :id_content');
        $this->db->bind(':id_content', $id_content);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
