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
    <tbody id="container_user">
<?php foreach($users as $user): ?>
    <tr>
        <td><?= $user->getId() ?></td>
        <td><?= $user->getFirstName().' '.$user->getLastName() ?></td>
        <td><?= $user->getLogin() ?></td>
        <td><?= $user->getEmail() ?></td>
        <td>
            <a class="btn btn_Delete_User btn-danger" href="<?= ROOT.'/Administration/deleteUser/'.$user->getId() ?>"></a>
        </td>


    </tr>
<?php endforeach ?>
    </tbody>
</table>