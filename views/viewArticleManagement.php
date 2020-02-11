<h2>Gestion des articles</h2>
<table>
    <thead>
        <tr>
            <th># ID</th>
            <th>Date</th>
            <th>Title</th>
            <th>Content</th>
            <th>Auteur</th>
            <th><a href="<?= ROOT.'/Administration/newArticle' ?>">Nouveau</a></th>
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
            <a href="<?= ROOT.'/Administration/editArticle/'.$article->getId() ?>">Editer</a>
            <a href="<?= ROOT.'/Administration/deleteArticle/'.$article->getId() ?>">Supprimer</a>
            <button>Commentaires</button>
        </td>


    </tr>
<?php endforeach ?>
    </tbody>
</table>