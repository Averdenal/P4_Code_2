<article>
    <h3><?= $tab['article']->getTitle(); ?></h3>
    <p><?= $tab['article']->getContent(); ?></p>
    <div class='infoArticle flex'>
        <div class="dateArticle"><?= $tab['article']->getDate(); ?></div>
        <div class="autorArticle"><?= $tab['article']->getFirstName().' '.$tab['article']->getLastName(); ?></div>
    </div>
</article>
<div class="Comment">
<?php if(!empty($_SESSION['msg_info'])): ?>
    <div class="alert alert_OK">
    <?= $_SESSION['msg_info']; ?>
    </div>
<?php endif; if($tab['isConnect']): ?>
    <form id="form_Comment" method="POST" action="<?= ROOT ?>/Comment/addComment">
        <input type="hidden" name="article" value="<?= $tab['article']->getId(); ?>">
        <textarea type="text" rows="10" name="content"></textarea>
        <input type="submit" value="Envoyer">
    </form>
<?php endif;
foreach($tab['comments'] as $comment): ?>
    
    <div class="item_Comment">
        <p><?= $comment->getContent(); ?></p>
        <div>
            <p><?= $comment->getDate() ?></p>
            <p><?= $comment->getAutor()[1].' '.$comment->getAutor()[2] ?></p>
        </div>
        <?php if($tab['isConnect']): 
            if ($_SESSION['auth'] == $comment->getAutor()[0] || $_SESSION['rang'] == 'admin'):?>
            <a class="btn btn_Delete" href="<?= ROOT.'/Comment/deleteComment/'. $comment->getId() ?>">Supprimer</a>
            <?php endif; ?>
            <a style='color:black' href='<?= ROOT .'/Comment/warningComment/'.$comment->getId() ?>'>Signaler</a>
        <?php endif; ?>
        
    </div>
<?php endforeach; ?>
</div>