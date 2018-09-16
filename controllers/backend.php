<?php

require_once('models/config.php');
require_once('models/AdminManager.php');

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

function showAdmin($pageId, $catId = '')
{
	$adminManager = new \OpenClassrooms\Projet4\Blog\AdminManager();
	$blogManager = new \OpenClassrooms\Projet4\Blog\BlogManager();

	//param set
	$setTotalPosts = $blogManager->setAdminPagination();
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
	$catSidebar = $adminManager->getCategory();
	$spamSidebar = $adminManager->getSpam();

	require('views/backend/adminView.php');
}

function addCategory($catName)
{
	$adminManager = new \OpenClassrooms\Projet4\Blog\AdminManager();

	$affectedLines = $adminManager->addCategory($catName);

	if ($affectedLines === false) {
		throw new Exception('Impossible d\'ajouter la catégorie !');
	} else {
		header('Location: index.php?page=admin');
	}
}

function delCategory($catId)
{
	$adminManager = new \OpenClassrooms\Projet4\Blog\AdminManager();

	$affectedLines = $adminManager->delCategory($catId);

	if ($affectedLines === false) {
		throw new Exception('Impossible de supprimer la catégorie !');
	} else {
		header('Location: index.php?page=admin');
	}
}

function approuveComment($commentId)
{
	$adminManager = new \OpenClassrooms\Projet4\Blog\AdminManager();

	$affectedLines = $adminManager->approuveComment($commentId);

	if ($affectedLines === false) {
		throw new Exception('Impossible d\'approuver le commentaire');
	} else {
		header('Location: index.php?page=admin');
	}
}

function deleteComment($commentId)
{
	$adminManager = new \OpenClassrooms\Projet4\Blog\AdminManager();

	$affectedLines = $adminManager->deleteComment($commentId);

	if ($affectedLines === false) {
		throw new Exception('Impossible de supprimer le commentaire');
	} else {
		header('Location: index.php?page=admin');
	}
}

function delPost($postId)
{
	$adminManager = new \OpenClassrooms\Projet4\Blog\AdminManager();

	$affectedLines = $adminManager->delPost($postId);
	$delcomment = $adminManager->delPostComment($postId);

	if ($affectedLines === false) {
		throw new Exception('Impossible de supprimer le post !');
	} else {
		header('Location: index.php?page=admin');
	}
}

function showCreatePost()
{
	$adminManager = new \OpenClassrooms\Projet4\Blog\AdminManager();
	
	$setStatus = $adminManager->setStatus(false);
	$status = $adminManager->getStatus();
	$categoryList = $adminManager->getCategory();

	require('views/backend/cruView.php');
}

function showEditPost($postId)
{
	$adminManager = new \OpenClassrooms\Projet4\Blog\AdminManager();

	$setStatus = $adminManager->setStatus(true);
	$status = $adminManager->getStatus();
	$categoryList = $adminManager->getCategory();
	$post = $adminManager->getPost4Edit($postId);

	require('views/backend/cruView.php');
}

function addPost($cat, $title, $post)
{
	$adminManager = new \OpenClassrooms\Projet4\Blog\AdminManager();

	$affectedLines = $adminManager->addPost($cat, $title, $post);

	if ($affectedLines === false) {
		throw new Exception('Impossible d\'ajouter le nouveau billet !');
	} else {
		header('Location: index.php?page=admin');
	}
}

function editPost($cat, $title, $post, $postId)
{
	$adminManager = new \OpenClassrooms\Projet4\Blog\AdminManager();

	$affectedLines = $adminManager->editPost($cat, $title, $post, $postId);

	if ($affectedLines === false) {
		throw new Exception('Impossible de modifier le billet');
	} else {
		header('Location: index.php?page=admin');
	}
}

function logOut()
{
	$_SESSION = array();
	session_destroy();
	header('Location: index.php');
}
