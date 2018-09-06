<?php

require_once('models/config.php');
require_once('models/AdminManager.php');

function showAdmin()
{
    $blogManager = new \OpenClassrooms\Projet4\Blog\BlogManager();
    $adminManager = new \OpenClassrooms\Projet4\Blog\AdminManager();
    
    $setTotalPosts = $blogManager->setTotalPosts();
    $totalPosts = $blogManager->getTotalPosts();
    //sidebar
    $categoryName = $blogManager->getCategoryName();
    $catSidebar = $blogManager->getCategorySideBar();
    $totalComments = $blogManager->getTotalComments();
    require('views/backend/adminView.php');
}
