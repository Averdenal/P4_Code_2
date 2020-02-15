<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $titlePage ?></title>
    <script src='https://cdn.tiny.cloud/1/0xmawf3lubyyx5fmj1ha9jwvfll5r4pk1r2srn5kttm6yviv/tinymce/5/tinymce.min.js' referrerpolicy="origin">
    </script>
    <script>
        tinymce.init({
        selector: 'textarea'
        });
    </script>
    <link rel="stylesheet" href="<?= CSS ?>style.css">
</head>
<body>
    <header>
        <?php include('template/menuNavigation.php'); ?>
    </header>
    <div class="body">
        <?= $content ?>
    </div>
    
</body>
</html>