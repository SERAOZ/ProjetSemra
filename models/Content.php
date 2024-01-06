<?php

class Content {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function listContent(){
        $this ->db ->query ("SELECT * from content order by title ASC");
        $contents = $this-> db -> resultSet();
        return $contents;
    }

    public function oneContent($id_content) {
        $this->db->query('SELECT * FROM content WHERE id_content= :id_content');
        $this->db->bind(':id_content', $id_content);
        $id_content=$this->db->single();
        return $id_content; 
    }

    public function addContent($content) {
        
        $this->db->query('INSERT INTO content (title, content_text, publicationDate) 
        VALUES(:title, :content_text, :publicationDate)');

        //Bind values
            $this->db->bind(':title', $content['title']);
            $this->db->bind(':content_text', $content['content_text']);
            $this->db->bind(':publicationDate', $content['publicationDate']);              
               
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateContent($content){
            
        $this->db->query('UPDATE content SET title= :title, content_text= :content_text, publicationDate=:publicationDate 
        WHERE id_content= :id_content');
       
       $this->db->bind(':title', $content['title']);
       $this->db->bind(':content_text', $content['content_text']);
       $this->db->bind(':publicationDate', $content['publicationDate']); 
               
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
