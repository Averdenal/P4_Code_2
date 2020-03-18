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
        <tbody>
    <?php foreach($comments as $comment): ?>
        <tr class="comment_Item_Admin">
            <td><?= $comment->getId() ?></td>
            <td><?= $comment->getDate() ?></td>
            <td><?= $comment->getContent() ?></td>
            <td><?= $comment->getAutor()['lastname'].' '.$comment->getAutor()['firstname'] ?></td>
            <td>
                <button class="btn btn_Delete_Comments_Admin btn-danger" data-id="<?= $comment->getId() ?>"> supprimer</button>
            </td>


        </tr>
    <?php endforeach ?>
        </tbody>
    </table>
</section>