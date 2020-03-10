<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $titlePage ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= CSS ?>style.css">
    <script src="https://kit.fontawesome.com/fd17f52da4.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

</head>
<body>
    <header>
        <?php include('template/menuNavigation.php'); ?>
    </header>
    <main class="container-fluid row">
            <aside class="col-2">
                <nav class="menu_admin">
                    <a href="<?= ROOT.'/Administration/articleManagement' ?>">Gestion des Articles</a>
                    <a href="<?= ROOT.'/Administration/commentManagement' ?>">Gestion des Commentaires</a>
                    <a href="<?= ROOT.'/Administration/userManagement' ?>">Gestion des utilisateurs</a>
                </nav>
            </aside>
            <div class="col-10">
                <p id="msg"></p>
                <div id="info"></div>
                <div id="zone-content">
                    <?= $content ?>
                </div>        
            </div>
    </main>
    <?php include('template/footer.php'); ?>
</body>
</html>