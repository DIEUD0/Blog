<?php
require('controllers/frontend.php');
require('controllers/backend.php');

try {
    if (isset($_GET['page'])) {
        if ($_GET['page'] == 'blog') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                showBlog($_GET['id']);
            }
        }

        elseif ($_GET['page'] == 'category') {
            if (isset($_GET['cat']) && $_GET['cat'] > 0 && isset($_GET['id']) && $_GET['id'] > 0) {
                showBlog($_GET['id'], $_GET['cat']);
            }
            elseif (isset($_GET['cat']) && $_GET['cat'] > 0 && empty($_GET['id'])) {
                showBlog(1, $_GET['cat']);
            } else {
                throw new Exception('Aucun identifiant de catégorie envoyé');
            }
        }

        elseif ($_GET['page'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                showPost($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['page'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['mail']) && !empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['mail'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['page'] == 'about') {
            showAbout();
        }

        elseif ($_GET['page'] == 'contact') {
            showContact();
        }

        elseif ($_GET['page'] == 'admin') {
            showAdmin();
        }
    }
    else {
        showBlog(1);
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}