<h2>Editer Article# <?= $user->getId() ?></h2>

<form method="POST" action="" id="edit_User">
    <input type="hidden" name="id" value="<?= $user->getId() ?>">
    <input type="text" name="title" placeholder="Titre de l'article" value="<?= $user->getlogin() ?>">
    <input type="text" name="firstname" placeholder="Titre de l'article" value="<?= $user->getFirstname() ?>">
    <input type="text" name="lastname" placeholder="Titre de l'article" value="<?= $user->getLastname() ?>">
    <input type="text" name="email" placeholder="Titre de l'article" value="<?= $user->getEmail() ?>">
    <select name="rang">
        <?php foreach($rangs as $rang): ?>
           <option value="<?= $rang->getId(); ?>"><?= $rang->getName(); ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Editer">
</form>