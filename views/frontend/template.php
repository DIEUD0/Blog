<!DOCTYPE html>
<html lang="fr">

<?php
    global $TITLEND, $SHOWADMIN;
    $activeMenu = ' active';
    $activeScreenReader = ' <span class="sr-only">(Page actuelle)</span>';
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= '<title>'. $title .' - '. $TITLEND .'</title>'; ?>

    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/style.css" />
    <link rel="icon" type="image/x-icon" href="./public/images/favicon.ico" />
    <!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="./public/images/favicon.ico" /><![endif]-->
    <meta name="description" content="Blog pour écrivain....">
</head>

<body>
    <div class="container">
        <header>
            <h1>
                <a class="none" href="index.php">
                    <?= $TITLEND ?>
                </a>
            </h1>
        </header>

        <nav class="navbar navbar-expand navbar-light bg-light">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item
                    <?php
                    if (empty($_GET['page']) || $_GET['page'] == 'blog' || $_GET['page'] == 'category' || $_GET['page'] == 'post') {
                        echo $activeMenu;
                    }
                    ?>
                ">
                    <a class="nav-link" href="index.php">Blog
                        <?php
                        if (empty($_GET['page']) || $_GET['page'] == 'blog' || $_GET['page'] == 'category' || $_GET['page'] == 'post') {
                            echo $activeScreenReader;
                        }
                        ?>
                    </a>
                </li>
                <li class="nav-item
                    <?php
                    if (isset($_GET['page']) && $_GET['page'] == 'about') {
                        echo $activeMenu;
                    }
                    ?>
                ">
                    <a class="nav-link" href="index.php?page=about">À propos
                        <?php
                        if (isset($_GET['page']) && $_GET['page'] == 'about') {
                            echo $activeScreenReader;
                        }
                        ?>
                    </a>
                </li>
                <li class="nav-item
                    <?php
                    if (isset($_GET['page']) && $_GET['page'] == 'contact') {
                        echo $activeMenu;
                    }
                    ?>
                ">
                    <a class="nav-link" href="index.php?page=contact">Contact
                        <?php
                        if (isset($_GET['page']) && $_GET['page'] == 'contact') {
                            echo $activeScreenReader;
                        }
                        ?>
                    </a>
                </li>
            </ul>
        </nav>

        <section class="row">
            <?= $content ?>
        </section>

        <footer>
            <p class="text-center">&copy; Blog créer pour un projet OpenClassrooms
                <?php
                if ($SHOWADMIN) {
                    echo ' - <a href="index.php?page=login">Administration</a>';
                }
                ?>
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