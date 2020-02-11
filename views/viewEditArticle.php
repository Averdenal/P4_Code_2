<h2>Editer Article# <?= $tab->getId() ?></h2>
<p>Vous pouvez créer un nouvel article</p>
<form method="POST" action="<?= ROOT.'/Articles/editArticle' ?>">
    <input type="text" name="title" placeholder="Titre de l'article" value="<?= $tab->getTitle() ?>">
    <textarea name="content" type="text"><?= $tab->getContent() ?></textarea>
    <input type="submit" value="Editer">
</form>