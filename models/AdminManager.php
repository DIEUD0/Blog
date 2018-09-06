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

    public function addCategory()
    {
        
    }
}