<?php $title = 'Administration'; ?>

<?php ob_start(); ?>

<aside class="col-md-4">

    <div>
        <p class="asidetitle">Catégories</p>
        <ul class="list-group">
            <?php
            while ($category = $catSidebar->fetch()) {
                ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="#">
                    <i class="fa fa-times text-danger" aria-hidden="true"></i>
                </a>
                <?= $category['name'] ?>
                <span class="badge badge-pill badge-primary">
                    <?= $category['total'] ?>
                </span>
            </li>
            <?php
            }
            $catSidebar->closeCursor();
            ?>
        </ul>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Ajouter une catégorie" aria-label="Ajouter une catégorie">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">+</button>
            </div>
        </div>
    </div>

    <div>
        <p class="asidetitle">Spam</p>
        <p>
            Aucun signalement pour le moment
        </p>
    </div>
</aside>
<article class="col-md-8">
    <div>
        <h2 class="">
        <button class="btn btn-outline-secondary article float-right" type="submit">
            <i class="fas fa-pencil-alt"></i> &nbsp; Écrire un nouvel article
        </button>
            Vos billets :
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
                        <th scope="row"><?= $post['id'] ?></th>
                        <td><a href="#" target="_blank"><?= htmlspecialchars($post['title']) ?></a></td>
                        <td><?= $post['creation_date_fr'] ?></td>
                        <td>
                            <a class="btn btn-primary" href="#" aria-label="Modifier">
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                            </a>
                            <a class="btn btn-danger" href="#" aria-label="Supprimer">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    <?php if ($pagination > 1) {
        ?>
    <ul class="pagination justify-content-center">
        <li class="page-item <?php if ($pageIndex == 1) {
            echo 'disabled';
        } ?> ">

            <?php if (!empty($categoryId)): ?>
            <a class="page-link" href="index.php?page=category&amp;cat=<?= $categoryId; ?>&amp;id=<?= $pageIndex-1; ?>">
                <i class="fas fa-chevron-left"></i> &nbsp; Précédent
            </a>
            <?php else: ?>
            <a class="page-link" href="index.php?page=blog&amp;id=<?= $pageIndex-1; ?>">
                <i class="fas fa-chevron-left"></i> &nbsp; Précédent
            </a>
            <?php endif; ?>

        </li>

        <?php
        for ($i = 1 ; $i <= $pagination ; $i++) {
            echo '<li class="page-item';
            if ($pageIndex == $i) {
                echo ' active';
            }
            echo '">';
            echo '<a class="page-link" href="index.php?page=';
            if (empty($categoryId)) {
                echo 'blog&amp;id=' . $i . '">' . $i;
            } else {
                echo 'category&amp;cat=' . $categoryId . '&amp;id=' . $i . '">' . $i;
            }
            if ($pageIndex == $i) {
                echo ' <span class="sr-only">(current)</span>';
            }
            echo '</a>';
            echo '</li>';
        } ?>

        <li class="page-item <?php if ($pageIndex == $pagination) {
            echo 'disabled';
        } ?> ">

            <?php if (!empty($categoryId)): ?>
            <a class="page-link" href="index.php?page=category&amp;cat=<?= $categoryId; ?>&amp;id=<?= $pageIndex+1; ?>">
                Suivant &nbsp; <i class="fas fa-chevron-right"></i>
            </a>
            <?php else: ?>
            <a class="page-link" href="index.php?page=blog&amp;id=<?= $pageIndex+1; ?>">
                Suivant &nbsp; <i class="fas fa-chevron-right"></i>
            </a>
            <?php endif; ?>

        </li>
    </ul>
    <?php
    } ?>
    </div>
</article>
<?php $content = ob_get_clean(); ?>

<?php require('template.php');
