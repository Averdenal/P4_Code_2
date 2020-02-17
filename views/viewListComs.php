<?php foreach($comments as $comment): ?>
    <div class="item_Comment">
        <p><?= $comment->getContent(); ?></p>
        <div>
            <p><?= $comment->getDate() ?></p>
            <p><?= $comment->getAutor()[1].' '.$comment->getAutor()[2] ?></p>
        </div>
        <?php if(!empty($_SESSION['auth'])): 
            if ($_SESSION['auth'] == $comment->getAutor()[0] || $_SESSION['rang'] == 'admin'):?>
            <a class="btn btn_Delete" href="<?= ROOT.'/Comment/deleteComment/'. $comment->getId() ?>">Supprimer</a>
            <?php endif; 
            if ($_SESSION['auth'] != $comment->getAutor()[0]):?>
            <a style='color:black' href='<?= ROOT .'/Comment/warningComment/'.$comment->getId() ?>'>Signaler</a>
            <?php endif;endif; ?>
        
    </div>
<?php endforeach; ?>