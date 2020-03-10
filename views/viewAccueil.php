<div class="list_Article_Accueil">
    <?php 
    foreach($listArticle as $article):
    ?>
    <article class="card">
        <div class="card-header card-title">
            <h2><?= $article->getTitle(); ?></h2>
        </div>
        <div class="card-body">
            <div class="card-text"><?= $article->getLitleContent(); ?></div>
            <a href="Article/<?= $article->getSlug() ?>" class="btn btn-primary">En lire plus.</a>
        </div>
        <div class="card-footer text-muted justify-content-between flex">
            <div><?= $article->getDate(); ?></div>
            <div><?= $article->getFirstName().' '.$article->getLastName(); ?></div>
        </div>
    </article>
    <?php 
    endforeach;
    ?>
</div>
