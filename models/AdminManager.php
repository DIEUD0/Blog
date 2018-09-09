<?php

namespace OpenClassrooms\Projet4\Blog;

require_once("models/Manager.php");

class AdminManager extends Manager
{
    private $_db;

    public function __construct()
    {
        $this->_db = $this->dbConnect();
    }

    public function getCategorySideBar()
    {
        $req = $this->_db->query('
        SELECT c.id, c.name, COUNT(b.categorie) total
        FROM categorie c
        LEFT JOIN blog b
        ON c.id = b.categorie
        GROUP BY c.id, c.name
        ');

        return $req;
    }

    public function addCategory($catName)
    {
        $cat = $this->_db->prepare('INSERT INTO categorie(name) VALUE(?)');
        $affectedLines = $cat->execute(array($catName));

        return $affectedLines;
    }

    public function delCategory($catId)
    {
        $cat = $this->_db->prepare('DELETE FROM categorie WHERE id=?');
        $affectedLines = $cat->execute(array($catId));

        return $affectedLines;
    }
}