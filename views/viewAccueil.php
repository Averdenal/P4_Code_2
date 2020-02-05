<?php
ob_start(); 
?>
<div class="list_Article_Accueil">
    <?php 
    foreach($articles as $article):
    ?>
    <article>
        <h3><?= $article->getTitle(); ?></h3>
        <p><?= $articleManager->shortText($article->getContent()); ?>
            <a href="Article/<?= $article->getSlug().'-'.$article->getId() ?>">En lire plus.</a>
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
<?php
$content = ob_get_clean();
require_once('template.php');