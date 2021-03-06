<?php
if (!empty($categoryId)) {
	$title = $categoryName;
	$hrefpagi = '&amp;cat='.$categoryId.'&amp;id=';
} else {
	$title = 'Accueil';
	$hrefpagi = '&amp;id=';
}
?>

<?php ob_start(); ?>
<article class="col-md-8">
	<?php
	while ($post = $posts->fetch()) {
		?>
	<div>
		<span class="datepost float-right">
			Posté le
			<?= $post['creation_date_fr'] ?>
		</span>
		<h2>
			<?= htmlspecialchars($post['title']) ?>
		</h2>
		<?= htmlspecialchars_decode($post['post']) ?>
		<p class="text-right">
			<a href="index.php?page=post&amp;id=<?= $post['id'] ?>">
				Ajouter un commentaire &nbsp; <i class="fas fa-pencil-alt"></i>
			</a>
		</p>
	</div>
	<?php
	} $posts->closeCursor();
	if ($pagination > 1) {
		?>
	<ul class="pagination justify-content-center">
		<li class="page-item 
		<?php
		if ($pageIndex == 1) {
			echo 'disabled';
		} ?>">
			<?php if (!empty($categoryId)): ?>
			<a class="page-link" href="index.php?page=blog&amp;cat=<?= $categoryId; ?>&amp;id=<?= $pageIndex - 1; ?>">
				<i class="fas fa-chevron-left"></i> &nbsp; Précédent
			</a>
			<?php else: ?>
			<a class="page-link" href="index.php?page=blog&amp;id=<?= $pageIndex - 1; ?>">
				<i class="fas fa-chevron-left"></i> &nbsp; Précédent
			</a>
			<?php endif; ?>
		</li>

		<?php
		for ($i = 1; $i <= $pagination; $i++) {
			?>
		<li class="page-item
		<?php if ($pageIndex == $i) {
				echo 'active';
			} ?>">
			<a class="page-link" href="index.php?page=blog<?= $hrefpagi,$i ?>">
				<?= $i ?>
			</a>
		</li>
		<?php
		} ?>

		<li class="page-item 
		<?php
		if ($pageIndex == $pagination) {
			echo 'disabled';
		} ?>">
			<?php if (!empty($categoryId)): ?>
			<a class="page-link" href="index.php?page=blog&amp;cat=<?= $categoryId; ?>&amp;id=<?= $pageIndex + 1; ?>">
				Suivant &nbsp; <i class="fas fa-chevron-right"></i>
			</a>
			<?php else: ?>
			<a class="page-link" href="index.php?page=blog&amp;id=<?= $pageIndex + 1; ?>">
				Suivant &nbsp; <i class="fas fa-chevron-right"></i>
			</a>
			<?php endif; ?>
		</li>
	</ul>
	<?php
	} ?>
</article>

<aside class="col-md-4">
	<div>
		<p class="asidetitle">Jean Forteroche</p>
		<img class="mx-auto d-block" src="./public/images/visage.png" alt="ma tete" />
		<p>Prochain roman : Billet simple pour l'Alaska</p>
	</div>
	<div>
		<p class="asidetitle">Catégories</p>
		<ul class="list-group">
			<?php
			while ($category = $catSidebar->fetch()) {
				?>
			<li class="list-group-item d-flex justify-content-between align-items-center
			<?php
			if (!empty($categoryId) && $categoryId == $category['id']) {
				echo ' active bg-secondary';
			} ?>">
				<a href="./index.php?page=blog&amp;cat=<?= $category['id'] ?>">
					<?= $category['name'] ?>
				</a>
				<span class="badge badge-pill
					<?php if (!empty($categoryId) && $categoryId == $category['id']): ?>
						badge-light
					<?php else: ?>
						badge-primary
					<?php endif; ?>">
					<?= $category['total'] ?>
				</span>
			</li>
			<?php
			} ?>
		</ul>
	</div>
	<div>
		<p class="asidetitle">
			<?php
			if (!empty($categoryId)) {
				echo $categoryName . ' :';
			} else {
				echo 'Statistiques';
			}
			?>
		</p>
		<p>
			<i class="far fa-newspaper"></i> &nbsp;
			<?= $totalPosts . ' article';
			if ($totalPosts > 1) {
				echo 's';
			} ?>
		</p>
		<p>
			<i class="fas fa-comment"></i> &nbsp;
			<?= $totalComments . ' commentaire';
			if ($totalComments > 1) {
				echo 's';
			} ?>
		</p>
	</div>
</aside>
<?php $content = ob_get_clean(); ?>

<?php require('template.php');
