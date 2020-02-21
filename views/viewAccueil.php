<div class="list_Article_Accueil">
    <?php 
    foreach($listArticle as $article):
    ?>
    <article>
        <div class='zone_Title'>
            <h3><?= $article->getTitle(); ?></h3>
        </div>
        <div class='zone_Content'>
            <p><?= $article->getLitleContent(); ?>
                <a href="Article/<?= $article->getSlug() ?>">En lire plus.</a>
            </p>
        </div>
        <div class='infoArticle flex'>
            <div class="dateArticle"><?= $article->getDate(); ?></div>
            <div class="autorArticle"><?= $article->getFirstName().' '.$article->getLastName(); ?></div>
        </div>
    </article>
    <?php 
    endforeach;
    ?>
</div>
