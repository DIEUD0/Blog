<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?= $title ?>
    </title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/style.css" />
    <link rel="icon" type="image/x-icon" href="./public/images/favicon.ico" />
    <!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="./public/images/favicon.ico" /><![endif]-->
    <meta name="description" content="Blog pour écrivain....">
    <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
</head>

<body>
    <div class="container">
        <header>
            <h1>Administration du blog</h1>
        </header>

        <nav class="navbar navbar-expand navbar-light bg-light">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item
                           <?php
                           if (isset($_GET['page']) && $_GET['page'] == 'admin') {
                               echo ' active';
                           }
                           ?>
                           ">
                    <a class="nav-link" href="index.php?page=admin">Accueil
                        <?php
                        if (isset($_GET['page']) && $_GET['page'] == 'admin') {
                            echo ' <span class="sr-only">(Page actuelle)</span>';
                        }
                        ?>
                    </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="index.php?page=logout">Déconnexion</a></li>
            </ul>
        </nav>

        <section class="row">

            <?= $content ?>

        </section>

        <footer>
            <p class="text-center">&copy; Blog créer pour un projet OpenClassrooms
            </p>
        </footer>

        <a href="#" id="go-top">
            <i class="fas fa-chevron-up fa-lg"></i>
        </a>
    </div>
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script defer src="//use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy"
        crossorigin="anonymous"></script>
    <script src="./public/js/gotop.js"></script>
</body>

</html>