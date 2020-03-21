<nav class="navbar navbar-expand-lg navbar-dark bg-primary justify-content-between">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="<?= HTTP ?>">Accueil</a>
        </div>
    </div>
    <div class="collapse navbar-collapse justify-content-center">
        <a class="navbar-brand" href="<?= HTTP ?>">Billet simple pour l'Alaska</a>
    </div>
    <div class="collapse navbar-collapse justify-content-end margin-menu">
        <?php if(isset($_SESSION['auth'])){ 
            if($_SESSION['rang'] === 'admin'): ?>
                <a href="<?= HTTP ?>/Administration/administrationAccueil" class="btn btn-dark"><i class="fas fa-user-shield"></i></a>
            <?php endif; ?>
                <a href="<?= HTTP ?>/Authentification/logout" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> </a>
            <?php }else{?>
                <button class="btn btn-info" id="connexionBtn">Connexion</button>
        <?php } ?>
    </div>
</nav>