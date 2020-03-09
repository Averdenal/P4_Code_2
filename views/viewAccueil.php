<div class="list_Article_Accueil">
    <?php 
    foreach($listArticle as $article):
    ?>
    <div class="card text-center">
        <div class="card-header card-title">
            <h2><?= $article->getTitle(); ?></h2>
        </div>
        <div class="card-body">
            <p class="card-text"><?= $article->getLitleContent(); ?></p>
            <a href="Article/<?= $article->getSlug() ?>" class="btn btn-primary">En lire plus.</a>
        </div>
        <div class="card-footer text-muted justify-content-between flex">
            <div><?= $article->getDate(); ?></div>
            <div><?= $article->getFirstName().' '.$article->getLastName(); ?></div>
        </div>
    </div>
    <?php 
    endforeach;
    ?>
</div>
