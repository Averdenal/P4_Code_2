<section id="container_Comment">
    <h2>Gestion des commentaires</h2>
        <div class="alert alert_OK">
        <p id='msg'></p>
        </div>
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
        <tbody id="zone_Comments">
    <?php foreach($tab as $comment): ?>
        <tr>
            <td><?= $comment->getId() ?></td>
            <td><?= $comment->getDate() ?></td>
            <td><?= $comment->getContent() ?></td>
            <td><?= $comment->getAutor()[1].' '.$comment->getAutor()[2] ?></td>
            <td>
                <a class="btn btn_Delete_Admin" href="<?= ROOT.'/Administration/deleteComment/'. $comment->getId() ?>">Supprimer</a>
            </td>


        </tr>
    <?php endforeach ?>
        </tbody>
    </table>
</section>