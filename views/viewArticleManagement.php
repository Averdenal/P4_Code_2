<h2>Gestion des articles</h2>
<table>
    <thead>
        <tr>
            <th># ID</th>
            <th>Date</th>
            <th>Title</th>
            <th>Content</th>
            <th>Auteur</th>
            <th><a class="btn btn_New" href="<?= ROOT.'/Administration/newArticle' ?>">Nouveau</a></th>
        </tr>
    </thead>
    <tbody>
<?php foreach($tab as $article): ?>
    <tr>
        <td><?= $article->getId() ?></td>
        <td><?= $article->getDate() ?></td>
        <td><?= $article->getTitle() ?></td>
        <td><?= $article->getLitleContent() ?></td>
        <td><?= $article->getFirstName().' '.$article->getLastName() ?></td>
        <td>
            <a class="btn btn_Edit" href="<?= ROOT.'/Administration/editArticle/'.$article->getId() ?>">Editer</a>
            <a class="btn btn_Delete" href="<?= ROOT.'/Administration/deleteArticle/'.$article->getId() ?>">Supprimer</a>
        </td>


    </tr>
<?php endforeach ?>
    </tbody>
</table>