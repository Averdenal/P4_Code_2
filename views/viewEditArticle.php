<h2>Editer Article# <?= $tab->getId() ?></h2>

<form method="POST" action="" id="edit_Article">
    <input type="hidden" name="id" value="<?= $tab->getId() ?>">
    <input type="text" name="title" placeholder="Titre de l'article" value="<?= $tab->getTitle() ?>">
    <textarea name="content" type="text"><?= $tab->getContent() ?></textarea>
    <input type="submit" value="Editer">
</form>