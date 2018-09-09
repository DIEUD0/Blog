<?php $title = 'Créer un nouveau billet'; ?>

<?php ob_start(); ?>
<article class="col-md-12">
    <div class="text-center">
        <h3>Création d'un nouveau billet :</h2>
            <form class="formcomment" action="index.php?action=addPost" method="post">
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Titre de l'article" name="title">
                    </div>
                    <div class="col">
                        <select class="custom-select" name="cat" required>
                            <?php
                            while ($category = $categoryList->fetch()) {
                                ?>
                            <option value="<?= $category['id'] ?>">
                                <?= $category['name'] ?>
                            </option>
                            <?php
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="tinymce" placeholder="Écrivez votre message ici" rows="12" name="post"></textarea>
                </div>
                <button class="btn btn-outline-success" type="submit"><i class="fa fa-paper-plane"></i> &nbsp; Poster maintenant !
            </form>
    </div>
</article>
<?php $content = ob_get_clean(); ?>

<?php require('template.php');
