<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $titlePage ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= CSS ?>style.css">
    <link rel="icon" href="<?= IMAGES ?>favicon.ico" />
    <script src="https://kit.fontawesome.com/fd17f52da4.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <header>
        <?php include('template/menuNavigation.php'); ?>
    </header>
    <main class="body">
        <?= $content ?>
    </main>
    <div id="connection">
        <button id="closeConnexionBtn">X</button>
        <p id="info_Register"></p>
        <div id="form_Connection">
            <form method="POST" action="<?= ROOT ?>/Authentification/login" class="flex flex-col" id="login">
                <h3>Connexion</h3>
                <input type="text" name="login" placeholder="Login" required>
                <input type="password" name="pwd" placeholder="Mot de passe" required>
                <button type="submit">Se connecter</button>
            </form>
            <p>Tu n'as pas de compte? <a class="a_Connect" id="action_Register">S'enregistrer</a></p>
        </div>
        <div id="form_Register">
            <form id="register" class="flex flex-col">
                <h3>S'enregister</h3>
                <input type="text" name="firstName" placeholder="Prénom" required> 
                <input type="text" name="lastName" placeholder="Nom" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="login" placeholder="Login" required>
                <input type="password" name="pwd" placeholder="Mot de passe" required>
                <input type="password" name="pwdConfirmation" placeholder="Confirmation" required>
                <button type="submit" class="btn btn-success">S'enregistrer</button>
            </form>
            <p>Tu as un compte? <a class="a_Connect" id="action_Connection">Se connecter</a></p>
        </div>
    </div>
    <?php include('template/footer.php'); ?>
</body>
</html>