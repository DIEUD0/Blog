<?php
$title = 'Créer un nouveau billet';
if ($status) {
	$toptext ='Modification';
	$postitle = $post['title'];
	$postitlevalue = $post['title'];
	$postcontent = $post['post'];
	$cat = $post['categorie'];
	$action = 'index.php?action=editPost&amp;id=' . $post['id'];
} else {
	$toptext ='Création';
	$postitle = 'Titre de l\'article';
	$postitlevalue = '';
	$postcontent = '';
	$cat = '';
	$action = 'index.php?action=addPost';
}
?>

<?php ob_start(); ?>
<article class="col-md-12">
	<div class="text-center">
		<h3>
			<?= $toptext ?> d'un nouveau billet :
		</h3>
		<form class="formcomment" action="<?= $action ?>" method="post">
			<div class="form-row">
				<div class="col">
					<input type="text" class="form-control" placeholder="<?= $postitle ?>" value="<?= $postitlevalue ?>" name="title">
				</div>
				<div class="col">
					<select class="custom-select" name="cat" required>
						<?php
							while ($category = $categoryList->fetch()) {
								?>
						<option value="<?= $category['id'] ?>" <?php if ($category['id']==$cat) {
									echo 'selected' ;
								} ?>>
							<?= $category['name'] ?>
						</option>
						<?php
							} ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<textarea class="form-control" id="tinymce" rows="16" name="post"><?= $postcontent ?></textarea>
			</div>
			<button class="btn btn-outline-success" type="submit"><i class="fa fa-paper-plane">
				</i> &nbsp; Poster maintenant !
			</button>
		</form>
	</div>
</article>
<?php $content = ob_get_clean(); ?>

<?php require('template.php');
