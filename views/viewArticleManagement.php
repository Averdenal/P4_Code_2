<section id="container_Article">
<h2>Gestion des articles</h2>
    <table>
        <thead>
            <tr>
                <th># ID</th>
                <th>Date</th>
                <th>Title</th>
                <th>Content</th>
                <th>Auteur</th>
                <th><a class="btn btn-primary" href="<?= ROOT.'/Administration/newArticle' ?>" title="Nouveau billet"><i class="fas fa-plus-square"></i> Nouveau</a></th>
            </tr>
        </thead>
        <tbody id="list_Articles">
    <?php foreach($articles as $article): ?>
        <tr>
            <td><?= $article->getId() ?></td>
            <td><?= $article->getDate() ?></td>
            <td><?= $article->getTitle() ?></td>
            <td><?= $article->getLitleContent() ?></td>
            <td><?= $article->getFirstName().' '.$article->getLastName() ?></td>
            <td>
                <a class="btn btn_Edit_Article btn-warning" href="<?= ROOT.'/Administration/editArticle/'.$article->getId() ?>" title="Editer"></a>
                <a class="btn btn_Delete_Article btn-danger" href="<?= ROOT.'/Administration/deleteArticle/'.$article->getId() ?>" title="Supprimer"></a>
            </td>


        </tr>
    <?php endforeach ?>
        </tbody>
    </table>
</section>