<h2>Editer Article# <?= $article->getId() ?></h2>

<form method="POST" action="" id="edit_Article">
    <input type="hidden" name="id" value="<?= $article->getId() ?>">
    <input type="text" name="title" placeholder="Titre de l'article" value="<?= $article->getTitle() ?>">
    <textarea name="content" type="text" id="Form_content"><?= $article->getContent() ?></textarea>
    <input type="submit" value="Editer">
</form>
