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
            <input type="text" class="form-control" placeholder="Ajouter une catégorie" aria-label="Ajouter une catégorie"
                aria-describedby="basic-addon2">
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

    <div>
        <p class="asidetitle">
            <?php
            if (!empty($categoryId)) {
                echo $categoryName.' :';
            } else {
                echo 'Statistiques';
            }
            ?>
        </p>
        <p><i class="far fa-newspaper"></i> &nbsp;
            <?= $totalPosts . ' article';
            if ($totalPosts > 1) {
                echo 's';
            } ?>
        </p>
        <p><i class="fas fa-comment"></i> &nbsp;
            <?= $totalComments . ' commentaire';
            if ($totalComments > 1) {
                echo 's';
            } ?>
        </p>
    </div>
</aside>
<article class="col-md-8 text-center">
    <div>
        <h2 class="">
            Vos billets
        </h2>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col"># - Cat</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1 - Sans catégorie</th>
                        <td>MarkMarkMarrk Mark</td>
                        <td>2018-08-18</td>
                        <td>Voir <br /> Modifier <br /> Supprimer</td>
                    </tr>
                    <tr>
                        <th scope="row">2 - Sans catégorie</th>
                        <td>Jacob</td>
                        <td>2018-08-18</td>
                        <td>Voir <br /> Modifier <br /> Supprimer</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button class="btn btn-outline-secondary article" type="submit"><i class="fas fa-pencil-alt"></i> &nbsp; Écrire un nouvel article</button>
    </div>
</article>
<?php $content = ob_get_clean(); ?>

<?php require('template.php');
