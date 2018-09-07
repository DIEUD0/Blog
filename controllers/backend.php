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
    $posts = $blogManager->getPosts();
    $pagination = $blogManager->getPagination();
    //sidebar
    $catSidebar = $adminManager->getCategorySideBar();

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