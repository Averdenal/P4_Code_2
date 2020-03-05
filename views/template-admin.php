<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $titlePage ?></title>
    <script src='https://cdn.tiny.cloud/1/0xmawf3lubyyx5fmj1ha9jwvfll5r4pk1r2srn5kttm6yviv/tinymce/5/tinymce.min.js' referrerpolicy="origin">
    </script>
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