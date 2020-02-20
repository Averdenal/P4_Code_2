<?php foreach($tab as $comment): ?>
    <div class="item_Comment">
        <p><?= $comment->getContent(); ?></p>
        <div>
            <p><?= $comment->getDate() ?></p>
            <p><?= $comment->getAutor()[1].' '.$comment->getAutor()[2] ?></p>
        </div>
        <?php if(!empty($_SESSION['auth'])): 
            if ($_SESSION['auth'] == $comment->getAutor()[0] || $_SESSION['rang'] == 'admin'):?>
            <a class="btn btn_Delete" href="<?= ROOT.'/Comment/deleteComment/'. $comment->getId().'/'.$comment->getArticle(); ?>">Supprimer</a>
            <?php endif; 
            if ($_SESSION['auth'] != $comment->getAutor()[0]):?>
            <a class="btn btn_Warning" href='<?= ROOT .'/Warning/warningComment/'.$comment->getId().'/'.$comment->getArticle(); ?>'>Signaler</a>
            <?php endif;endif; ?>
        
    </div>
<?php endforeach; ?>