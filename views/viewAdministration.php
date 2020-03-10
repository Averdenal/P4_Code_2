<h2>Administration</h2>
<div class="flex flex-wrap">
    <div class="cart flex-1">
    <p>Nombre d'articles</p>
        <div class="cercle cercle-green">
            <h3><?= $tab['articleNb']; ?></h3> 
        </div>
        
    </div>
    <div class="cart flex-1">
    <p>Nombre de commentaires</p>
        <div class="cercle cercle-orange">
            <h3><?= $tab['commentNb']; ?></h3> 
        </div>
        
    </div>
    <div class="cart flex-1">
    <p>Nombre de warnings</p>
        <div class="cercle cercle-red">
            <h3><?= $tab['warningNb']; ?></h3> 
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
            <?php foreach($tab['commentWarning'] as $comment): ?>
                <tr>
                    <th># <?= $comment->getId(); ?></th>
                    <th><?= $comment->getContent(); ?></th>
                    <th><?= $comment->getAutor()['lastname'].' '.$comment->getAutor()['firstname']; ?></th>
                    <th><?= $comment->getNbWarning(); ?></th>
                    <th>
                        <a class="btn btn_Valide_Warning btn-danger" href="<?= ROOT.'/Administration/deleteComment/'. $comment->getId(); ?>"><i class="fas fa-trash-alt"></i></a>
                        <a class="btn btn_Delete_Warning btn-success" href="<?= ROOT.'/Administration/deleteWarning/'. $comment->getId(); ?>"><i class="fas fa-check-circle"></i></a>
                    </th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>