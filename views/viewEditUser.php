<h2>Editer user# <?= $user->getId() ?></h2>
<form id="form_Modif_User">
    <input type="hidden" name="id" value="<?= $user->getId() ?>">
    <div class="form-group">
        <label for="Login">Login</label>
        <input type="text" class="form-control" name="login" aria-describedby="Login" value="<?= $user->getlogin() ?>">
    </div>
    <div class="form-group">
        <label for="Email1">Email</label>
        <input type="email" class="form-control" name="Email" aria-describedby="emailHelp" value="<?= $user->getEmail() ?>">
    </div>
    <div class="form-group">
        <label for="firstname">Prénom</label>
        <input type="text" class="form-control" name="firstname" value="<?= $user->getFirstname() ?>">
    </div>
    <div class="form-group">
        <label for="lastname">Nom</label>
        <input type="text" class="form-control" name="lastname" value="<?= $user->getLastname() ?>">
    </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
