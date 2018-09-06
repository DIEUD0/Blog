<?php

require_once('models/config.php');
require_once('models/AdminManager.php');

function showAdmin($pageId)
{
    $adminManager = new \OpenClassrooms\Projet4\Blog\AdminManager();
    $blogManager = new \OpenClassrooms\Projet4\Blog\BlogManager();

    //param set
    $setPage = $blogManager->setParameter($pageId);
    $setTotalPosts = $blogManager->setAdminView();
    $setTotalPosts = $blogManager->setTotalPosts();
    //param get
    $pageIndex = $blogManager->getParameter();
    $totalPosts = $blogManager->getTotalPosts();

    //page
    $posts = $blogManager->getPosts();
    $pagination = $blogManager->getPagination();
    //sidebar
    $catSidebar = $adminManager->getCategorySideBar();


    require('views/backend/adminView.php');
}
