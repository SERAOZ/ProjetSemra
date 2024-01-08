<?php

class Page {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function listContent(){
        $this ->db ->query ("SELECT * from content inner join category on content.id_category=category.id_category order by publicationDate DESC");
        $contents = $this-> db -> resultSet();
        return $contents;
    }
}
