<?php

namespace OpenClassrooms\Projet4\Blog;

require_once("models/Manager.php");

class BlogManager extends Manager
{
	private $_db;
	private $_parameter;
	private $_categoryId;
	private $_postsPerPage;
	private $_totalPosts;
	private $_adminView;

	public function __construct()
	{
		$this->_db = $this->dbConnect();
		global $POSTSPERPAGE;
		$this->_postsPerPage = $POSTSPERPAGE;
	}

	public function setParameter($parameter)
	{
		$this->_parameter = (int) $parameter;
	}

	public function setCategoryId($parameter)
	{
		$this->_categoryId = (int) $parameter;
	}

	public function setAdminView()
	{
		$this->_adminView = true;
		$this->_postsPerPage =  $this->_postsPerPage * 2;
	}

	public function setTotalPosts()
	{
		if (empty($this->_categoryId)) {
			$req = $this->_db->query('SELECT COUNT(*) AS totalposts FROM blog');
			$data = $req->fetch();

			$this->_totalPosts = $data['totalposts'];
		} else {
			$req = $this->_db->query('SELECT COUNT(*) AS totalposts FROM blog WHERE categorie = ' . $this->_categoryId);
			$data = $req->fetch();

			$this->_totalPosts = $data['totalposts'];
		}
	}

	public function getTotalPosts()
	{
		return $this->_totalPosts;
	}

	public function getPagination()
	{
		$pagi  = ceil($this->_totalPosts / $this->_postsPerPage);

		return $pagi;
	}

	public function getParameter()
	{
		return $this->_parameter;
	}

	public function getCategoryId()
	{
		return $this->_categoryId;
	}

	public function getPosts()
	{
		$firstMessageToShow = ($this->_parameter - 1) * $this->_postsPerPage;
		if (empty($this->_categoryId)) {
			$req = $this->_db->query('SELECT id, title, post, DATE_FORMAT(post_date, \'%d/%m/%Y\') AS creation_date_fr FROM blog 
            ORDER BY id DESC LIMIT ' . $firstMessageToShow .' , ' . $this->_postsPerPage);

			return $req;
		} else {
			$req = $this->_db->query('SELECT id, title, post, DATE_FORMAT(post_date, \'%d/%m/%Y\') AS creation_date_fr FROM blog 
            WHERE categorie = ' . $this->_categoryId . ' ORDER BY id DESC LIMIT ' . $firstMessageToShow .' , ' . $this->_postsPerPage);

			return $req;
		}
	}

	public function getCategoryName()
	{
		if (!empty($this->_categoryId)) {
			$req = $this->_db->query('SELECT name FROM categorie WHERE id = ' . $this->_categoryId);
			$data = $req->fetch();

			return $data['name'];
		}
	}

	public function getCategorySideBar()
	{
		$req = $this->_db->query('
        SELECT c.id, c.name, COUNT(b.categorie) total
        FROM blog b
        LEFT JOIN categorie c
        ON c.id = b.categorie
        GROUP BY c.id, c.name
        ');

		return $req;
	}

	public function getTotalComments()
	{
		if (empty($this->_categoryId)) {
			$req = $this->_db->query('SELECT COUNT(*) AS numbercomments FROM comment');
			$data = $req->fetch();

			return $data['numbercomments'];
		} else {
			$req = $this->_db->query('
            SELECT COUNT(*) total
            FROM comment c
            LEFT JOIN blog b
            ON b.id = c.post_id 
            WHERE categorie = ' . $this->_categoryId);
			$data = $req->fetch();

			return $data['total'];
		}
	}
}
