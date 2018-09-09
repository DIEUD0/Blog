<?php $title = 'Créer un nouveau billet'; ?>

<?php ob_start(); ?>
<article class="col-md-12">
    <div>
        <h3 class="text-center">Création d'un nouveau billet :</h2>
        <form class="formcomment text-center" action="index.php?action=newPost" method="post">
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Titre de l'article" id="subject" name="subject">
                </div>
                <div class="col">
                    <select class="custom-select" required>
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
                <textarea class="form-control" id ="tinymce" placeholder="Écrivez votre message ici" rows="12" id="comment" name="comment"></textarea>
            </div>
            <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-envelope"></i> &nbsp; Envoyer le
                message</button>
        </form>
    </div>
</article>
<?php $content = ob_get_clean(); ?>

<?php require('template.php');
