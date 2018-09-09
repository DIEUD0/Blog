<?php $title = 'Créer un nouveau billet'; ?>

<?php ob_start(); ?>
<article class="col-md-12">
    <div class="text-center">
        <h3>Création d'un nouveau billet :</h2>
        <form class="formcomment" action="index.php?action=newPost" method="post">
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Titre de l'article" id="title" name="title">
                </div>
                <div class="col">
                    <select class="custom-select" id="cat" name="cat" required>
                    <?php
            while ($category = $catSidebar->fetch()) {
                ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php
            }
            $catSidebar->closeCursor();
            ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <textarea class="form-control" id ="tinymce" placeholder="Écrivez votre message ici" rows="12" name="post"></textarea>
            </div>
            <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-envelope"></i> &nbsp; Valider
        </form>
    </div>
</article>
<?php $content = ob_get_clean(); ?>

<?php require('template.php');
