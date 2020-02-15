<nav class="flex-3">
    <ul class='flex'>
        <li>
            <a href="<?= ROOT ?>">Accueil</a>
        </li>
    </ul>
</nav>
<nav class='flex-3'>
    <ul class='flex flex-right'>
        <?php if(isset($_SESSION['auth'])){ 
            if($_SESSION['rang'] === 'admin'):
            ?>
            <li>
                <a href="<?= ROOT ?>/Administration/administrationAccueil" >Administration</a>
            </li>
            <?php endif; ?>
            <li>
                <a href="<?= ROOT ?>/Authentification/logout" >Déconnnexion</a>
            </li>
        <?php }else{?>
            <li>
                <button id="connexionBtn">Connexion</button>
            </li>
        <?php } ?>
    </ul>
</nav>