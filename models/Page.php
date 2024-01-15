<?php


class Page {
    private $db;
    
    // Constructeur de la classe Page, initialise la connexion à la base de données.
    public function __construct() {
        $this->db = new Database;
    }

    // Récupère la liste de tous les contenus avec leurs catégories associées, triée par date de publication décroissante.
    public function listContent(){
        $this->db->query("SELECT * FROM content 
        INNER JOIN category 
        ON content.id_category = category.id_category 
        ORDER BY publicationDate DESC");
        
        $contents = $this->db->resultSet();
        return $contents;
    }
}

