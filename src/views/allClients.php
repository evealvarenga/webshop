<?php
$pdo = (new Conexion())->conectar();
$users = (new Clients())->getClients($pdo);
?>

<section class = profile>
    <div class="container-profile">
        <h2 class="header-profile">
            <span></span> Administrador de usuarios
        </h2>
        <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Tipo de usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td>ID: <?= $user->getId() ?></td>
                    <td><?= $user->getName() ?></td>
                    <td><?= $user->getAdmin() ?></td>
                    <td>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>  
    </div>
</section>