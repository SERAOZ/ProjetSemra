<?php

class Content {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function listContent(){
        $this ->db ->query ("SELECT * from content inner join category on content.id_category=category.id_category order by title ASC");
        $contents = $this-> db -> resultSet();
        return $contents;
    }

    public function oneContent($id_content) {
        $this->db->query('SELECT * FROM content inner join category on content.id_category=category.id_category WHERE id_content= :id_content');
        $this->db->bind(':id_content', $id_content);
        $content=$this->db->single();
        return $content; 
    }

    public function addContent($content) {
        
        $this->db->query('INSERT INTO content (title, content_text, publicationDate, id_category) 
        VALUES(:title, :content_text, :publicationDate, :id_category)');

        //Bind values
            $this->db->bind(':title', $content['title']);
            $this->db->bind(':content_text', $content['content_text']);
            $this->db->bind(':publicationDate', $content['publicationDate']);
            $this->db->bind(':id_category', $content['id_category']);               
               
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateContent($content){
            
        $this->db->query('UPDATE content SET title= :title, content_text= :content_text, publicationDate=:publicationDate, id_category=:id_category WHERE id_content= :id_content');
        $this->db->bind(':id_content', $content['id_content']);
        $this->db->bind(':title', $content['title']);
        $this->db->bind(':content_text', $content['content_text']);
        $this->db->bind(':publicationDate', $content['publicationDate']);
        $this->db->bind(':id_category', $content['id_category']);  
               
            //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }         
    }

    public function deleteContent($id_content){
    
        $this->db->query('DELETE FROM content WHERE id_content = :id_content');
        $this->db->bind('id_content', $id_content);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
