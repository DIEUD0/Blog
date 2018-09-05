<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<article class="col-md-12">
    <div>
        <span class="datepost float-right">
            Posté le
            <?= $post['creation_date_fr'] ?>
        </span>
        <h2>
            <?= htmlspecialchars($post['title']) ?>
        </h2>
        <p>
            <?= nl2br(htmlspecialchars($post['post'])) ?>
        </p>
    </div>
    <div>
        <h3>Ajouter un commentaire :</h3>
        <form class="formcomment text-center" action="index.php?page=addComment&amp;id=<?= $post['id'] ?>"
            method="post">
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Prénom" id="author" name="author">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Adresse email" id="mail" name="mail">
                </div>
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="Écrivez votre commentaire ici" rows="6" id="comment" name="comment"></textarea>
            </div>
            <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-envelope"></i> &nbsp; Envoyer le
                commentaire</button>
        </form>
    </div>
    <?php
    while ($comment = $comments->fetch()) {
        ?>
    <div>
        <span class="datepost float-right">
            Posté le
            <?= $comment['comment_date_fr'] ?> &nbsp;
            <a href="index.php?page=post&amp;id=<?= $post['id'] ?>" class="spam">Signaler
                <i class="fa fa-times"></i></a>
        </span>
        <p>
            <strong>
                <?= htmlspecialchars($comment['author']) ?></strong>
        </p>

        <p>
            <?= nl2br(htmlspecialchars($comment['comment'])) ?>
        </p>
    </div>
    <?php
    }
    ?>
</article>
<?php $content = ob_get_clean(); ?>

<?php require('template.php');
