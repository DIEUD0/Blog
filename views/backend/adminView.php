<?php $title = 'Administration'; ?>

<?php ob_start(); ?>

<article class="col-lg-8">
	<div>
		<a class="btn btn-outline-success article float-right" href="index.php?page=newPost" role="button">
			<i class="fas fa-pencil-alt"></i> &nbsp; Écrire un nouvel article
		</a>
		<h2>
			<?php
			if (empty($categoryId)) {
				echo 'Vos billets :';
			} else {
				echo '"' . $categoryName . '"';
			} ?>
		</h2>
		<div class="table-responsive">
			<table class="table table-hover text-center">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Titre</th>
						<th scope="col">Date</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while ($post = $posts->fetch()) {
						?>
					<tr>
						<th scope="row">
							<?= $post['id'] ?>
						</th>
						<td>
							<a href="index.php?page=post&amp;id=<?= $post['id'] ?>" target="_blank">
								<?= htmlspecialchars($post['title']) ?>
							</a>
						</td>
						<td>
							<?= $post['creation_date_fr'] ?>
						</td>
						<td>
							<a class="btn btn-primary" href="index.php?page=editPost&amp;id=<?= $post['id'] ?>" aria-label="Modifier">
								<i class="fas fa-pencil-alt" aria-hidden="true"></i>
							</a>
							<a class="btn btn-danger" href="index.php?action=delPost&amp;id=<?= $post['id'] ?>" aria-label="Supprimer">
								<i class="fa fa-trash" aria-hidden="true"></i>
							</a>
						</td>
					</tr>
					<?php
					} $posts->closeCursor(); ?>
				</tbody>
			</table>
		</div>

		<?php
		if ($pagination > 1) {
			?>
		<ul class="pagination justify-content-center">
			<li class="page-item 
			<?php
			if ($pageIndex == 1) {
				echo 'disabled';
			} ?>">
				<?php if (!empty($categoryId)): ?>
				<a class="page-link" href="index.php?page=admin&amp;cat=<?= $categoryId; ?>&amp;id=<?= $pageIndex - 1; ?>">
					<i class="fas fa-chevron-left"></i> &nbsp; Précédent
				</a>
				<?php else: ?>
				<a class="page-link" href="index.php?page=admin&amp;id=<?= $pageIndex - 1; ?>">
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
				<a class="page-link" href="index.php?page=admin
				<?php if (empty($categoryId)): ?>
					<?= '&amp;id='.$i ?>
				<?php else: ?>
					<?= '&amp;cat='.$categoryId.'&amp;id='.$i ?>
				<?php endif; ?>">
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
				<a class="page-link" href="index.php?page=admin&amp;cat=<?= $categoryId; ?>&amp;id=<?= $pageIndex + 1; ?>">
					Suivant &nbsp; <i class="fas fa-chevron-right"></i>
				</a>
				<?php else: ?>
				<a class="page-link" href="index.php?page=admin&amp;id=<?= $pageIndex + 1; ?>">
					Suivant &nbsp; <i class="fas fa-chevron-right"></i>
				</a>
				<?php endif; ?>
			</li>
		</ul>
		<?php
		} ?>
	</div>
</article>

<aside class="col-lg-4">
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
				<span>
					<a href="./index.php?action=delCategory&amp;id=<?= $category['id'] ?>">
						<i class="fa fa-times text-danger" aria-hidden="true"></i>
					</a>
				</span>
				<?php if ($category['total'] > 0): ?>
				<a class="text-center" href="./index.php?page=admin&amp;cat=<?= $category['id'] ?>">
					<?= $category['name'] ?>
				</a>
				<?php else: ?>
				<?= $category['name'] ?>
				<?php endif; ?>
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
			} $catSidebar->closeCursor(); ?>
		</ul>
		<form action="index.php?action=addCategory" method="post">
			<div class="input-group mb-3">
				<input type="text" class="form-control" placeholder="Ajouter une catégorie" aria-label="Ajouter une catégorie" id="catName" name="catName">
				<div class="input-group-append">
					<button class="btn btn-outline-success" type="submit"><i class="fas fa-plus"></i></button>
				</div>
			</div>
		</form>
	</div>
	<div>
		<p class="asidetitle">Spam :</p>
		<div id="carouselContent" class="carousel slide" data-interval="false">
			<div class="carousel-inner">
				<?php $x = 1;
				while ($spam = $spamSidebar->fetch()) {
					?>
				<div title="<?= $spam['mail']; ?>" class="<?php if ($x == 1) {
						echo 'active';
					} ?> carousel-item text-center p-4">
					<p>
						<strong>
							<?= $spam['author']; ?>
						</strong>
						<i>
							<?= '('.$spam['creation_date_fr'].')' ?>
						</i>
					</p>
					<p>
						<?= $spam['comment']; ?>
					</p>
					<p class="text-danger">Reporté
						<?= $spam['report']; ?> fois
					</p>
					<span class="d-flex justify-content-around">
						<a href="index.php?action=deleteComment&amp;id=<?= $spam['id']; ?>"><i class="fa fa-times fa-2x text-danger"></i></a>
						<a href="index.php?page=post&amp;id=<?= $spam['post_id'] . '#' . $spam['id']; ?>" target="_blank"><i class="fas fa-eye fa-2x"></i></a>
						<a href="index.php?action=approuveComment&amp;id=<?= $spam['id']; ?>"><i class="fas fa-check fa-2x text-success "></i></a>
					</span>
				</div>
				<?php $x++;
				} ?>
			</div>
			<a class="carousel-control-prev" href="#carouselContent" role="button" data-slide="prev">
				<span><i class="fa fa-angle-left text-secondary fa-2x" aria-hidden="true"></i></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselContent" role="button" data-slide="next">
				<span><i class="fa fa-angle-right text-secondary fa-2x" aria-hidden="true"></i></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</aside>

<?php $content = ob_get_clean(); ?>

<?php require('template.php');
