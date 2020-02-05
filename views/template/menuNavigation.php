<nav class="flex-3">
    <ul class='flex'>
        <li>
            <a href="<?= ROOT ?>">Accueil</a>
        </li>
    </ul>
</nav>
<nav class='flex-3'>
    <ul class='flex flex-right'>
        <?php if(isset($_SESSION['auth'])){ ?>
            <li>
                <form action="<?= ROOT ?>/Authentification/logout" method="POST">
                    <button type="submit">Déconnnexion</button>
                </form>
            </li>
        <?php }else{?>
            <li>
                <button id="connexionBtn">Connexion</button>
            </li>
        <?php } ?>
    </ul>
</nav>