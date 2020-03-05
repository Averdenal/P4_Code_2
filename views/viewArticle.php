<article>
    <h3><?= $article->getTitle(); ?></h3>
    <p><?= $article->getContent(); ?></p>
    <div class='infoArticle flex'>
        <div class="dateArticle"><?= $article->getDate(); ?></div>
        <div class="autorArticle"><?= $article->getFirstName().' '.$article->getLastName(); ?></div>
    </div>
</article>
<div class="alert" id="info"></div>
    <?php if($userIsConnect): ?>
    <form id="form_Comment" action="/P4_Code_2/Articles/addComment">
        <input type="hidden" name="article" value="<?= $article->getId(); ?>">
        <textarea type="text" rows="2" name="content" id="textComs"></textarea>
        <input type="submit" value="Envoyer">
    </form>
<?php endif; ?>
<div class="Comment" id="container_Comment">
    <?php foreach($comments as $comment): ?>
        <div class="item_Comment">
            <p><?= $comment['comment']->getContent(); ?></p>
            <div>
                <p><?= $comment['comment']->getDate() ?></p>
                <p><?= $comment['comment']->getAutor()['firstname'].' '.$comment['comment']->getAutor()['lastname'] ?></p>
            </div>
            <?php if(!empty($_SESSION['auth'])): 
                if ($_SESSION['auth'] == $comment['comment']->getAutor()['id'] || $_SESSION['rang'] == 'admin'):?>
                    <a class="btn btn_Delete" href="<?= ROOT.'/Articles/deleteComment/'. $comment['comment']->getId().'/'.$comment['comment']->getArticle(); ?>">Supprimer</a>
                <?php endif; 
                if ($_SESSION['auth'] != $comment['comment']->getAutor()['id'] && $comment['warningByConnect'] == 0):?>
                    <a class="btn btn_Warning" href='<?= ROOT .'/Articles/addWarning/'.$comment['comment']->getId().'/'.$comment['comment']->getArticle(); ?>'>Signaler</a>
                <?php elseif($comment['warningByConnect'] == 1): ?>
                    <p>Warning OK</p>
                <?php endif;
            endif; ?>
            
        </div>
    <?php endforeach; ?>
</div>