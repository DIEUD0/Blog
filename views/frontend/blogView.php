<?php 
if (!empty($categoryId)) {
    $title = $categoryName;
} else { 
    $title = 'Accueil';  
}
?>

<?php ob_start(); ?>
<article class="col-md-8">
    <?php
    while ($post = $posts->fetch())
    {
    ?>
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
        <p class="text-right"><a href="index.php?page=post&amp;id=<?= $post['id'] ?>">Lire en entier ou ajouter un commentaire &nbsp; <i class="fas fa-pencil-alt"></i></a></p>
    </div>
    <?php
    }
    ?>
    <?php if ($pagination > 1) { ?>
    <ul class="pagination justify-content-center">
        <li class="page-item <?php if ($pageIndex == 1) { echo 'disabled'; } ?> ">
        
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
        for ($i = 1 ; $i <= $pagination ; $i++)
        {
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
        }
        ?>

        <li class="page-item <?php if ($pageIndex == $pagination) { echo 'disabled'; } ?> ">

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
    <?php } ?>
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
            while ($category = $catSidebar->fetch())
            {
            ?>
            <a href="./index.php?page=category&amp;cat=<?= $category['id'] ?>">
                <li class="list-group-item d-flex justify-content-between align-items-center
                    <?php if (!empty($categoryId) && $categoryId == $category['id']) { echo ' active bg-secondary'; } ?>
                ">
                    <?= $category['name'] ?>

                        <?php if (!empty($categoryId) && $categoryId == $category['id']): ?> 
                            <span class="badge badge-light badge-pill">
                        <?php else: ?>
                            <span class="badge badge-primary badge-pill">
                        <?php endif; ?>

                    <?= $category['total'] ?></span>
                </li>
            </a>
            <?php
            }
            $catSidebar->closeCursor();
            ?>
        </ul>
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
            <?= $totalPosts; ?> article<?php if($totalPosts > 1) { echo 's'; } ?></p>
        <p><i class="fas fa-comment"></i> &nbsp;
            <?= $totalComments; ?> commentaire<?php if($totalComments > 1) { echo 's'; } ?></p>
    </div>
</aside>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>