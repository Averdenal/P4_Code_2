<h2>Editer Article# <?= $tab->getId() ?></h2>
<h3><?= $tab->getTitle() ?></h3>
<div>
    <?= $tab->getContent() ?>
</div>
<div>
<a class="btn btn_Edit_Article" href="<?= ROOT.'/Administration/editArticle/'.$tab->getId() ?>">Editer l'article</a>
<a class="btn btn_Back" href="<?= ROOT.'/Administration/articleManagement' ?>">Liste des articles</a>
</div>
