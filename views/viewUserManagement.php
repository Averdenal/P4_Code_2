<h2>Gestion des utilisateurs</h2>
<table>
    <thead>
        <tr>
            <th># ID</th>
            <th>Prenom/Nom</th>
            <th>Login</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
<?php foreach($tab as $user): ?>
    <tr>
        <td><?= $user->getId() ?></td>
        <td><?= $user->getFirstName().' '.$user->getLastName() ?></td>
        <td><?= $user->getLogin() ?></td>
        <td><?= $user->getEmail() ?></td>
        <td>
            <a class="btn btn_User_Delete" href="<?= ROOT.'/Administration/deleteUser/'.$user->getId() ?>">Supprimer</a>
        </td>


    </tr>
<?php endforeach ?>
    </tbody>
</table>