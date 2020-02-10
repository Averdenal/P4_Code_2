<h2>Gestion des articles</h2>
<table>
    <thead>
        <tr>
            <th># ID</th>
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
        <td><?= $article->getTitle() ?></td>
        <td><?= $article->getLitleContent() ?></td>
        <td><?= $article->getFirstName().' '.$article->getLastName() ?></td>
        <td>
            <button>Editer</button>
            <button>Supprimer</button>
            <button>Commentaires</button>
        </td>


    </tr>
<?php endforeach ?>
    </tbody>
</table>