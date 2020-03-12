<section id="container_Comment">
    <h2>Gestion des commentaires</h2>
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
    <?php foreach($comments as $comment): ?>
        <tr>
            <td><?= $comment->getId() ?></td>
            <td><?= $comment->getDate() ?></td>
            <td><?= $comment->getContent() ?></td>
            <td><?= $comment->getAutor()['lastname'].' '.$comment->getAutor()['firstname'] ?></td>
            <td>
                <a class="btn btn_Delete_Admin btn-danger" href="<?= ROOT.'/Administration/deleteComment/'. $comment->getId() ?>"></a>
            </td>


        </tr>
    <?php endforeach ?>
        </tbody>
    </table>
</section>