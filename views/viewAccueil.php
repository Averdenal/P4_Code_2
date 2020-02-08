<div class="list_Article_Accueil">
    <?php 
    foreach($tab as $article):
    ?>
    <article>
        <h3><?= $article->getTitle(); ?></h3>
        <p><?= $article->getLitleContent(); ?>
            <a href="Article/<?= $article->getSlug() ?>">En lire plus.</a>
        </p>
        <div class='infoArticle flex'>
            <div class="dateArticle"><?= $article->getDate(); ?></div>
            <div class="autorArticle"><?= $article->getFirstName().' '.$article->getLastName(); ?></div>
        </div>
    </article>
    <?php 
    endforeach;
    ?>
</div>
