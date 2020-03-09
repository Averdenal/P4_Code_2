<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $titlePage ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= CSS ?>style.css">
</head>
<body>
    <header>
        <?php include('template/menuNavigation.php'); ?>
    </header>
    <main class="body">
        <div class="flex flex-wrap">
            <div class="flex-1">
                <nav class="menu_admin">
                    <a href="<?= ROOT.'/Administration/articleManagement' ?>">Gestion des Articles</a>
                    <a href="<?= ROOT.'/Administration/commentManagement' ?>">Gestion des Commentaires</a>
                    <a href="<?= ROOT.'/Administration/userManagement' ?>">Gestion des utilisateurs</a>
                </nav>
            </div>
            <div class="flex-5">
                <p id="msg"></p>
                <div id="info"></div>
                <div id="zone-content">
                <?= $content ?>
                </div>
                
            </div>
        </div>
    </main>
    <?php include('template/footer.php'); ?>
</body>
</html>