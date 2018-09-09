<?php
require('controllers/frontend.php');
require('controllers/backend.php');
require('controllers/function.inc.php');

try {
    if (isset($_GET['page'])) {
        if ($_GET['page'] == 'blog') {
            if (isset($_GET['cat']) && $_GET['cat'] > 0 && isset($_GET['id']) && $_GET['id'] > 0) {
                showBlog($_GET['id'], $_GET['cat']);
            } elseif (isset($_GET['cat']) && $_GET['cat'] > 0 && empty($_GET['id'])) {
                showBlog(1, $_GET['cat']);
            } elseif (isset($_GET['id']) && $_GET['id'] > 0) {
                showBlog($_GET['id']);
            }
        } elseif ($_GET['page'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                showPost($_GET['id']);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['page'] == 'about') {
            showAbout();
        } elseif ($_GET['page'] == 'contact') {
            if (isset($_GET['status']) && $_GET['status'] == 'sended') {
                showContact(true);
            } else {
                showContact();
            }
        } elseif ($_GET['page'] == 'admin') {
            if (isset($_GET['cat']) && $_GET['cat'] > 0 && isset($_GET['id']) && $_GET['id'] > 0) {
                showAdmin($_GET['id'], $_GET['cat']);
            } elseif (isset($_GET['cat']) && $_GET['cat'] > 0 && empty($_GET['id'])) {
                showAdmin(1, $_GET['cat']);
            } elseif (isset($_GET['id']) && $_GET['id'] > 0) {
                showAdmin($_GET['id']);
            } else {
                showAdmin(1);
            }
        } elseif ($_GET['page'] == 'new') {
            showCreatePost();
        }
    } elseif (isset($_GET['action'])) {
        if ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['mail']) && !empty($_POST['author']) && !empty($_POST['comment'])) {
                    if (verify_mail($_POST['mail'])) {
                        addComment($_GET['id'], $_POST['mail'], $_POST['author'], $_POST['comment']);
                    } else {
                        throw new Exception('Votre adresse email est incorrect');
                    }
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'sendMail') {
            if (!empty($_POST['subject']) && !empty($_POST['comment']) && !empty($_POST['mail'])) {
                if (sanitize_mail($_POST['mail'])) {
                    sendMail($_POST['subject'], $_POST['comment'], $_POST['mail']);
                } else {
                    throw new Exception('Votre adresse email est incorrect');
                }
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        } elseif ($_GET['action'] == 'addCategory') {
            if (!empty($_POST['catName'])) {
                addCategory($_POST['catName']);
            } else {
                throw new Exception('Aucune catégorie choisie');
            }
        } elseif ($_GET['action'] == 'delCategory') {
            if (!empty($_GET['id'])) {
                delCategory($_GET['id']);
            } else {
                throw new Exception('Aucune catégorie choisie');
            }
        } elseif ($_GET['action'] == 'addPost') {
            if (!empty($_POST['cat']) && !empty($_POST['title']) && !empty($_POST['post'])) {
                addPost($_POST['cat'], $_POST['title'], $_POST['post']);
            } else {
                throw new Exception('Problème d\'ajout de billet');
            }
        } elseif ($_GET['action'] == 'delPost') {
            if (!empty($_GET['id'])) {
                delPost($_GET['id']);
            } else {
                throw new Exception('Aucun billet choisi');
            }
        } elseif ($_GET['action'] == 'editPost') {
            if (!empty($_GET['id'])) {
                editPost($_GET['id']);
            } else {
                throw new Exception('Aucun billet choisi');
            }
        } elseif ($_GET['action'] == 'report') {
            if (!empty($_GET['post']) && !empty($_GET['id'])) {
                reportComment($_GET['post'], $_GET['id']);
            } else {
                throw new Exception('Aucun commentaire choisi');
            }
        } elseif ($_GET['action'] == 'deleteComment') {
            if (!empty($_GET['id'])) {
                deleteComment($_GET['id']);
            } else {
                throw new Exception('Aucun commentaire choisi');
            }
        } elseif ($_GET['action'] == 'approuveComment') {
            if (!empty($_GET['id'])) {
                approuveComment($_GET['id']);
            } else {
                throw new Exception('Aucun commentaire choisi');
            }
        } 
    } else {
        showBlog(1);
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
