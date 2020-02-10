<h2>Gestion des utilisateurs</h2>
<table>
    <thead>
        <tr>
            <th># ID</th>
            <th>Prenom/Nom</th>
            <th>Login</th>
            <th>Email</th>
            <th><button>Nouveau</button></th>
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
            <button>Editer</button>
            <button>Supprimer</button>
        </td>


    </tr>
<?php endforeach ?>
    </tbody>
</table>