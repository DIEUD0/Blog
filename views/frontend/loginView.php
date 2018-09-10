<?php $title = 'Se connecter'; ?>

<?php ob_start(); ?>
<article class="col-md-12">
    <div class="text-center">
        <h2>Connectez-vous !</h2>
        <form class="text-center form-login" action="index.php?action=login" method="post">
            <input type="text" class="form-control" placeholder="Nom de l'utilisateur" name="name">
            <input type="password" class="form-control" placeholder="Mot de passe" name="password">
            <button class="btn btn-outline-success" type="submit"><i class="fas fa-user"></i> &nbsp; Se connecter</button>
        </form>
    </div>
</article>
<?php $content = ob_get_clean(); ?>

<?php require('template.php');
