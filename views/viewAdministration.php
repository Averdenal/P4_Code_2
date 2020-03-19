<h2>Administration</h2>
<div class="d-flex justify-content-around">
    <div class="card-admin text-center">
    <p>Nombre d'articles</p>
        <div class="cercle cercle-green">
            <h3><?= $nbArticles; ?></h3> 
        </div>
        
    </div>
    <div class="card-admin text-center">
    <p>Nombre de commentaires</p>
        <div class="cercle cercle-orange align-middle">
            <h3><?= $nbComments; ?></h3> 
        </div>
        
    </div>
    <div class="card-admin text-center">
    <p>Nombre de warnings</p>
        <div class="cercle cercle-red">
            <h3><?= $nbWarnings; ?></h3> 
        </div>
        
    </div>
</div>
<section class="tab_comment">
    <h3>Commentaires avec Warning</h3>
    <p id="info_msg"></p>
    <table>
        <thead>
            <tr>
                <th># ID</th>
                <th>Commentaires</th>
                <th>Auteur</th>
                <th>Nb Warning</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($warnings as $comment): ?>
                <tr>
                    <th># <?= $comment->getId(); ?></th>
                    <th><?= $comment->getContent(); ?></th>
                    <th><?= $comment->getAutor()['lastname'].' '.$comment->getAutor()['firstname']; ?></th>
                    <th><?= $comment->getNbWarning(); ?></th>
                    <th>
                        <button class="btn btn_Valide_Warning btn-danger" data-id="<?= $comment->getId(); ?>"></button>
                        <a class="btn btn_Delete_Warning btn-success" href="<?= ROOT.'/Administration/deleteWarning/'. $comment->getId(); ?>" data-id="<?=  $comment->getId(); ?>"></a>
                    </th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>