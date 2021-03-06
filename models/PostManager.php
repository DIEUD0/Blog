<?php

namespace OpenClassrooms\Projet4\Blog;

require_once("models/Manager.php");

class PostManager extends Manager
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

	public function getPost($postId)
	{
		$req = $this->_db->prepare('SELECT id, title, post, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM blog WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

	public function getComments($postId)
	{
		$comments = $this->_db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comment WHERE post_id = ? ORDER BY comment_date DESC');
		$comments->execute(array($postId));

		return $comments;
	}

	public function postComment($postId, $mail, $author, $comment)
	{
		$comments = $this->_db->prepare('INSERT INTO comment(post_id, mail, author, comment, comment_date) VALUES(?, ?, ?, ?, NOW())');
		$affectedLines = $comments->execute(array($postId, $mail, $author, $comment));

		return $affectedLines;
	}

	public function reportComment($commentId)
	{
		$comments = $this->_db->prepare('UPDATE comment SET report = report+1 WHERE id = ?');
		$affectedLines = $comments->execute(array($commentId));

		return $affectedLines;
	}
}
