<?php

require_once('models/config.php');
require_once('models/BlogManager.php');
require_once('models/PostManager.php');

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
    $posts = $blogManager->getPosts();
    $pagination = $blogManager->getPagination();
    //sidebar
    $categoryName = $blogManager->getCategoryName();
    $catSidebar = $blogManager->getCategorySideBar();
    $totalComments = $blogManager->getTotalComments();

    require('views/frontend/blogView.php');
}

function showPost($postId)
{
    $postManager = new \OpenClassrooms\Projet4\Blog\PostManager();

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
    }
    else {
        header('Location: index.php?page=post&id=' . $postId);
    }
}

function showAbout()
{


    require('views/frontend/aboutView.php');
}

function showContact()
{


    require('views/frontend/contactView.php');
}
