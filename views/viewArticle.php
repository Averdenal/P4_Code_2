<article class="card">
    <div class="card-header card-title text-center">
        <h2><?= $article->getTitle(); ?></h2>
    </div>
    <div class="card-body">
        <div class="card-text"><?= $article->getContent(); ?></div>
    </div>
    <div class="card-footer text-muted justify-content-between flex">
        <div><?= $article->getDate(); ?></div>
        <div><?= $article->getFirstName().' '.$article->getLastName(); ?></div>
    </div>
</article>
<div id="info"></div>
<p>Les commentaires</p>
    <?php if($userIsConnect): ?>
    <form id="form_Comment" action="/P4_Code_2/Articles/addComment" method="POST">
        <input type="hidden" name="article" value="<?= $article->getId(); ?>">
        <textarea type="text" rows="2" name="content" id="textComs"></textarea>
        <input type="submit" value="Envoyer" id='btn_Add_comment_form'>
    </form>
<?php endif; ?>
<div class="Comment" id="container_Comment">
    <?php foreach($comments as $comment): ?>
    <article class="card">
        <div class="card-body">
            <p class="card-text"><?= $comment['comment']->getContent(); ?></p>
        </div>
        <div class="card-footer text-muted justify-content-between flex">
            <div><?= $comment['comment']->getDate() ?></div>
            <div>
            <?php if(!empty($_SESSION['auth'])): 
                if ($_SESSION['auth'] == $comment['comment']->getAutor()['id'] || $_SESSION['rang'] == 'admin'):?>
                    <a class="btn btn_Delete btn-danger" href="<?= ROOT.'/Articles/deleteComment/'. $comment['comment']->getId().'/'.$comment['comment']->getArticle(); ?>">Supprimer</a>
                <?php endif; 
                if ($_SESSION['auth'] != $comment['comment']->getAutor()['id'] && $comment['warningByConnect'] == 0):?>
                    <a class="btn btn_Warning btn-warning" href='<?= ROOT .'/Articles/addWarning/'.$comment['comment']->getId().'/'.$comment['comment']->getArticle(); ?>'>Signaler</a>
                <?php elseif($comment['warningByConnect'] == 1): ?>
                    <p>Warning OK</p>
                <?php endif;
            endif; ?>
            </div>
            <div><?= $comment['comment']->getAutor()['firstname'].' '.$comment['comment']->getAutor()['lastname'] ?></div>

            
        </div>
    </article>
    <?php endforeach; ?>
</div>