<h2>Gestion des commentaires</h2>
<table>
    <thead>
        <tr>
            <th># ID</th>
            <th>Date</th>
            <th>Content</th>
            <th>Auteur</th>
            <th><a class="btn btn_New" href="<?= ROOT.'/Administration/newArticle' ?>">Nouveau</a></th>
        </tr>
    </thead>
    <tbody>
<?php foreach($tab as $comment): ?>
    <tr>
        <td><?= $comment->getId() ?></td>
        <td><?= $comment->getDate() ?></td>
        <td><?= $comment->getContent() ?></td>
        <td><?= $comment->getAutor()[1].' '.$comment->getAutor()[2] ?></td>
        <td>
            <a class="btn btn_Delete" href="<?= ROOT.'/Comment/deleteComment/'. $comment->getId() ?>">Supprimer</a>
            <a class="btn btn_Edit" href="<?= ROOT.'/Warning/deleteWarning/'. $comment->getId() ?>">Valider</a>
        </td>


    </tr>
<?php endforeach ?>
    </tbody>
</table>