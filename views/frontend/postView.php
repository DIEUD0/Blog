<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<article class="col-md-12">
	<?php
	if ($status) {
		?>
	<div class="bg-success text-light">
		<h3 class="text-center">Merci d'avoir reporter un commentaire indésirable ! &nbsp;<i class="fas fa-check"></i></h3>
	</div>
	<?php
	} ?>
	<div>
		<span class="datepost float-right">
			Posté le
			<?= $post['creation_date_fr'] ?>
		</span>
		<h2>
			<?= htmlspecialchars($post['title']) ?>
		</h2>
		<?= htmlspecialchars_decode($post['post']) ?>
	</div>
	<div>
		<h3>Ajouter un commentaire :</h3>
		<form class="formcomment text-center" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
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
			<button class="btn btn-outline-secondary" type="submit">
				<i class="fas fa-envelope"></i> &nbsp; Envoyer le commentaire
			</button>
		</form>
	</div>
	<?php
	while ($comment = $comments->fetch()) {
		?>
	<div id="<?= $comment['id'] ?>">
		<span class="datepost float-right">
			Posté le
			<?= $comment['comment_date_fr'] ?> &nbsp;
			<a href="index.php?action=report&amp;post=<?= $post['id'] ?>&amp;id=<?= $comment['id'] ?>" class="spam">
				Signaler <i class="fa fa-times"></i>
			</a>
		</span>
		<p>
			<strong>
				<?= htmlspecialchars($comment['author']) ?>
			</strong>
		</p>
		<p>
			<?= nl2br(htmlspecialchars($comment['comment'])) ?>
		</p>
	</div>
	<?php
	} ?>
</article>
<?php $content = ob_get_clean(); ?>

<?php require('template.php');
