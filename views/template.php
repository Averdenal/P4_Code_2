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
    <main class="body">
        <?= $content ?>
    </main>
    <div id="connection">
        <button id="closeConnexionBtn" class="close">X</button>
        <div id="form_Connection">
            <form method="POST" action="" class="flex flex-col">
                <h3>Connexion</h3>
                <input type="text" name="login" placeholder="Login" required>
                <input type="password" name="pwd" placeholder="Mot de passe" required>
                <button type="submit">Se connecter</button>
            </form>
            <p>Tu n'as pas de compte? <button id="action_Register" class="btn_None">S'enregistrer</button></p>
        </div>
        <div id="form_Register">
            <form method="POST" action="" class="flex flex-col">
                <h3>S'enregister</h3>
                <input type="text" name="firstName" placeholder="Prénom" required> 
                <input type="text" name="lastName" placeholder="Nom" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="login" placeholder="Login" required>
                <input type="password" name="pwd" placeholder="Mot de passe" required>
                <input type="password" name="pwdConfirmation" placeholder="Confirmation" required>
                <button type="submit">Se connecter</button>
            </form>
            <p>Tu as un compte? <button class="btn_None" id="action_Connection">Se connecter</button></p>
        </div>
    </div>
    <footer>

    </footer>
    <script src="<?= JS ?>app.js"></script>
    <script>
        new App();
    </script>
</body>
</html>