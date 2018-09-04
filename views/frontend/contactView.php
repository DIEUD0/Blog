<?php $title = 'Contact'; ?>

<?php ob_start(); ?>
<article class="col-md-12">
    <div>
        <h2>Vous souhaitez me contacter ?</h2>
        <p>
            Nam tincidunt diam magna, id gravida orci egestas nec. Curabitur id nunc ipsum. Mauris sagittis id dolor quis euismod. Donec at dictum tortor. Duis pulvinar vulputate laoreet. Praesent quis arcu libero.
        </p>
        <form class="formcomment text-center" action="index.php?page=sendMail" method="post">
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Nom" id="name" name="name">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Prénom" id="firstname" name="firstname">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Adresse email" id="mail" name="mail">
                </div>
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="Écrivez votre message ici" rows="8" id="comment" name="comment"></textarea>
            </div>
            <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-envelope"></i> &nbsp; Envoyer le message</button>
        </form>
    </div>
</article>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>