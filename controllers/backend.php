<?php

require_once('models/config.php');
require_once('models/AdminManager.php');

function showAdmin($pageId, $catId = '')
{
    $adminManager = new \OpenClassrooms\Projet4\Blog\AdminManager();
    $blogManager = new \OpenClassrooms\Projet4\Blog\BlogManager();

    //param set
    $setPage = $blogManager->setParameter($pageId);
    $setCat = $blogManager->setCategoryId($catId);
    $setTotalPosts = $blogManager->setAdminView();
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

function showCreatePost()
{
    $adminManager = new \OpenClassrooms\Projet4\Blog\AdminManager();
    
    $categoryList = $adminManager->getCategory();

    require('views/backend/createPostView.php');
}

function showEditPost($postId)
{
    $adminManager = new \OpenClassrooms\Projet4\Blog\AdminManager();
    $postManager = new \OpenClassrooms\Projet4\Blog\PostManager();

    $categoryList = $adminManager->getCategory();
    $post = $postManager->getPost($postId);

    require('views/backend/createPostView.php');
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

function delPost($postId)
{
    $adminManager = new \OpenClassrooms\Projet4\Blog\AdminManager();

    $affectedLines = $adminManager->delPost($postId);

    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer le post !');
    } else {
        header('Location: index.php?page=admin');
    }
}

function editPost($postId)
{
    $adminManager = new \OpenClassrooms\Projet4\Blog\AdminManager();

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
        $_SESSION['pseudo'] = $pseudo;
        header('Location: index.php?page=admin');
    }
}

function logOut()
{
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');
}
