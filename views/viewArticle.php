<article>
    <h3><?= $tab['article']->getTitle(); ?></h3>
    <p><?= $tab['article']->getContent(); ?></p>
    <div class='infoArticle flex'>
        <div class="dateArticle"><?= $tab['article']->getDate(); ?></div>
        <div class="autorArticle"><?= $tab['article']->getFirstName().' '.$tab['article']->getLastName(); ?></div>
    </div>
</article>
<div class="alert" id="info"></div>
    <?php if($tab['isConnect']): ?>
    <form id="form_Comment" action="" method="POST">
        <input type="hidden" name="article" value="<?= $tab['article']->getId(); ?>">
        <textarea type="text" rows="2" name="content" id="textComs"></textarea>
        <input type="submit" value="Envoyer">
    </form>
<?php endif; ?>
<div class="Comment" id="container_Comment">
        <?php echo $tab['comments']; ?>
</div>