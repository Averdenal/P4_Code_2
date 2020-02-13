<h2>Gestion des commentaires</h2>
<?php if(!empty($_SESSION['msg_info'])): ?>
    <div class="alert alert_OK">
    <?= $_SESSION['msg_info']; ?>
    </div>
<?php endif; ?>
<table>
    <thead>
        <tr>
            <th># ID</th>
            <th>Date</th>
            <th>Content</th>
            <th>Auteur</th>
            <th>Action</th>
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
        </td>


    </tr>
<?php endforeach ?>
    </tbody>
</table>