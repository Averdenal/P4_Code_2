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
    <form id="form_Comment" action="<?= ROOT ?>/Articles/addComment" method="POST" data-id="<?= $article->getId(); ?>">
        <textarea type="text" rows="2" name="content" id="textComs"></textarea>
        <input type="submit" value="Envoyer" id='btn_Add_comment_form'>
    </form>
<?php endif; ?>
<div class="Comment" id="container_Comment">
    <?php foreach($comments as $comment): ?>
    <article class="card comment_Item">
        <div class="card-body">
            <p class="card-text"><?= $comment['comment']->getContent(); ?></p>
        </div>
        <div class="card-footer text-muted justify-content-between flex">
            <div><?= $comment['comment']->getDate() ?></div>
            <div>
            <?php if(!empty($_SESSION['auth'])): 
                if ($_SESSION['auth'] == $comment['comment']->getAutor()['id'] || $_SESSION['rang'] == 'admin'):?>
                    <button class="btn btn_Delete_Comments btn-danger" data-idarticle="<?= $comment['comment']->getArticle() ?>" data-idcomment="<?= $comment['comment']->getId() ?>">Supprimer</button>
                <?php endif; 
                if ($_SESSION['auth'] != $comment['comment']->getAutor()['id'] && $comment['warningByConnect'] == 0):?>
                    <button class="btn btn_Warning btn-warning" data-idarticle="<?= $comment['comment']->getArticle() ?>" data-idcomment="<?= $comment['comment']->getId() ?>" >Signaler</button>
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