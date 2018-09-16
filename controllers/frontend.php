<?php

require_once('models/config.php');
require_once('models/BlogManager.php');
require_once('models/PostManager.php');
require_once('models/ContactManager.php');

function showBlog($pageId, $catId = '')
{
	$blogManager = new \OpenClassrooms\Projet4\Blog\BlogManager();

	//param set
	$setPage = $blogManager->setParameter($pageId);
	$setCat = $blogManager->setCategoryId($catId);
	$setTotalPosts = $blogManager->setTotalPosts();
	//param get
	$pageIndex = $blogManager->getParameter();
	$categoryId = $blogManager->getCategoryId();
	$totalPosts = $blogManager->getTotalPosts();
	
	//page
	$categoryName = $blogManager->getCategoryName();
	$posts = $blogManager->getPosts();
	$pagination = $blogManager->getPagination();
	//sidebar
	$catSidebar = $blogManager->getCategorySideBar();
	$totalComments = $blogManager->getTotalComments();

	require('views/frontend/blogView.php');
}

function showPost($postId, $status = '')
{
	$postManager = new \OpenClassrooms\Projet4\Blog\PostManager();

	//param
	$setStatus = $postManager->setStatus($status);
	$status = $postManager->getStatus(); // True if Comment Reported

	//page
	$post = $postManager->getPost($postId);
	$comments = $postManager->getComments($postId);

	require('views/frontend/postView.php');
}

function addComment($postId, $mail, $author, $comment)
{
	$postManager = new \OpenClassrooms\Projet4\Blog\PostManager();

	$affectedLines = $postManager->postComment($postId, $mail, $author, $comment);

	if ($affectedLines === false) {
		throw new Exception('Impossible d\'ajouter le commentaire !');
	} else {
		header('Location: index.php?page=post&id=' . $postId);
	}
}

function reportComment($postId, $commentId)
{
	$postManager = new \OpenClassrooms\Projet4\Blog\PostManager();

	$affectedLines = $postManager->reportComment($commentId);

	if ($affectedLines === false) {
		throw new Exception('Impossible de reporter le commentaire !');
	} else {
		header('Location: index.php?page=post&id=' . $postId . '&report=ok');
	}
}

function showAbout()
{
	require('views/frontend/aboutView.php');
}

function showContact($status = '')
{
	$contactManager = new \OpenClassrooms\Projet4\Blog\ContactManager();
	
	$setStatus = $contactManager->setStatus($status);
	$status = $contactManager->getStatus(); // True if Mail Sended

	require('views/frontend/contactView.php');
}

function sendMail($subject, $comment, $mail)
{
	$contactManager = new \OpenClassrooms\Projet4\Blog\ContactManager();
	
	$sendIt = $contactManager->sendMail($subject, $comment, $mail);
	
	if ($sendIt === false) {
		throw new Exception('Impossible d\'envoyer l\'email !');
	} else {
		header('Location: index.php?page=contact&status=sended');
	}
}

function showLogin()
{
	require('views/frontend/loginView.php');
}

function tryLogin($pseudo, $pass)
{
	$adminManager = new \OpenClassrooms\Projet4\Blog\AdminManager();
	
	$affectedLines = $adminManager->checkLogin($pseudo, $pass);

	if ($affectedLines === false) {
		throw new Exception('Identifiant incorrect');
	} else {
		session_start();
		$_SESSION['pseudo'] = $affectedLines['pseudo'];
		header('Location: index.php?page=admin');
	}
}
