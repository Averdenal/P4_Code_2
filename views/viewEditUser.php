<h2>Editer user# <?= $user->getId() ?></h2>
<form>
    <input type="hidden" name="id" value="<?= $user->getId() ?>">
    <div class="form-group">
        <label for="Login">Login</label>
        <input type="text" class="form-control" id="login" aria-describedby="Login" value="<?= $user->getlogin() ?>">
    </div>
    <div class="form-group">
        <label for="Email1">Email</label>
        <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" value="<?= $user->getEmail() ?>">
    </div>
    <div class="form-group">
        <label for="firstname">Prénom</label>
        <input type="text" class="form-control" id="firstname" value="<?= $user->getFirstname() ?>">
    </div>
    <div class="form-group">
        <label for="lastname">Nom</label>
        <input type="text" class="form-control" id="lastname" value="<?= $user->getLastname() ?>">
    </div>
    <div class="form-row" id="modif_rang">
        <div class="form-group col-2" id="change_Rang">
            <label>Rang : <?= $rang->getName() ?><label>
            <input type="hidden" value="<?= $rang->getId() ?>" >
        </div>
        <div class="col-2">
           <button id="btn_modif_rang" class="btn btn-success">Modifier</button>
        </div>
    </div>
    
    <div class="form-group" id="selet_Rang">
        <label for="rangs">Rang</label>
        <select class="form-control" id="rangs">
        <?php var_dump($rangs);
            foreach($rangs as $rang): ?>
            <option value="<?= $rang->getId(); ?>"><?= $rang->getName(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
