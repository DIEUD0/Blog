<?php

namespace OpenClassrooms\Projet4\Blog;

require_once("models/Manager.php");

class AdminManager extends Manager
{
	private $_db;
	private $_status;

	public function __construct()
	{
		$this->_db = $this->dbConnect();
	}

	public function setStatus($status)
	{
		$this->_status = $status;
	}

	public function getStatus()
	{
		return $this->_status;
	}

	public function checkLogin($pseudo, $pass)
	{
		$req = $this->_db->prepare('SELECT pseudo, pass FROM admin WHERE pseudo = ?');
		$req->execute(array($pseudo));
		$resultat = $req->fetch();
		if (password_verify($pass, $resultat['pass'])) {
			return $resultat;
		} else {
			return false;
		}
	}

	public function getCategory()
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

	public function getSpam()
	{
		$req = $this->_db->query('
        SELECT id, post_id, author, mail, comment, report, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS creation_date_fr
        FROM comment
        WHERE report > 1
        ORDER BY report DESC
        ');

		return $req;
	}

	public function getPost4Edit($postId)
	{
		$req = $this->_db->prepare('SELECT id, categorie, title, post FROM blog WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
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

	public function approuveComment($commentId)
	{
		$post = $this->_db->prepare('UPDATE comment SET report = 0 WHERE id=?');
		$affectedLines = $post->execute(array($commentId));

		return $affectedLines;
	}

	public function deleteComment($commentId)
	{
		$post = $this->_db->prepare('DELETE FROM comment WHERE id=?');
		$affectedLines = $post->execute(array($commentId));

		return $affectedLines;
	}

	public function delPost($postId)
	{
		$post = $this->_db->prepare('DELETE FROM blog WHERE id=?');
		$affectedLines = $post->execute(array($postId));

		return $affectedLines;
	}

	public function delPostComment($postId)
	{
		$post = $this->_db->prepare('DELETE FROM comment WHERE post_id=?');
		$affectedLines = $post->execute(array($postId));

		return $affectedLines;
	}

	public function addPost($cat, $title, $post)
	{
		$new = $this->_db->prepare('INSERT INTO blog(categorie, title, post, post_date) VALUES(?, ?, ?, NOW())');
		$affectedLines = $new->execute(array($cat, $title, $post));

		return $affectedLines;
	}

	public function editPost($cat, $title, $post, $postId)
	{
		$new = $this->_db->prepare('UPDATE blog SET categorie=?, title=?, post=? WHERE id=?');
		$affectedLines = $new->execute(array($cat, $title, $post, $postId));
		return $affectedLines;
	}
}
