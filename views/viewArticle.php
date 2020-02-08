<?php
ob_start(); 
?>
<article>
    <h3><?= $article->getTitle(); ?></h3>
    <p><?= $article->getContent(); ?></p>
    <div class='infoArticle flex'>
        <div class="dateArticle"><?= $article->getDate(); ?></div>
        <div class="autorArticle"><?= $article->getFirstName().' '.$article->getLastName(); ?></div>
    </div>
</article>
<div class="Comment">
<?php if($isconnect): ?>
    <form id="form_Comment" method="POST" action="<?= ROOT ?>/Comment/addComment">
        <input type="hidden" name="article" value="<?= $article->getId(); ?>">
        <textarea type="text" rows="10" name="content"></textarea>
        <input type="submit" value="Envoyer">
    </form>
<?php endif;
foreach($comments as $comment): ?>
    
    <div class="item_Comment">
        <p><?= $comment->getContent(); ?></p>
        <div>
            <p><?= $comment->getDate() ?></p>
            <p><?= $comment->getAutor()[1].' '.$comment->getAutor()[2] ?></p>
        </div>
        
<<<<<<< HEAD
        <form action="<?= ROOT ?>/Comment/deleteComment" method="POST">
            <input type="hidden" name="idComment" value="<?= $comment->getId(); ?>">
            <input type="hidden" name="idArticle" value="<?= $article->getId(); ?>">
=======
        <form action="<?= ROOT ?>/Comment/delete" method="POST">
            <input type="hidden" name="article" value="<?= $article->getId(); ?>">
            <input type="hidden" name="id" value="<?= $comment->getId(); ?>">
>>>>>>> 7fd046fdadea2b3d4f620e5906338e3e5359dffa
            <input type="submit" value="Supprimer">
        </form>
        
    </div>
<?php endforeach; ?>
</div>
<?php 
$content = ob_get_clean();
require_once('template.php');