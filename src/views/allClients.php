<?php if (!isset($_SESSION["user"])) {header("Location: /www/webshop/index.php?page=404&error=No has iniciado sesión con tu cuenta."); exit;}?>
<?php if (!isAdmin()) { header("Location: /www/webshop/index.php?page=404&error=No tienes permisos suficientes."); exit;}?>
<?php 
    try {
        $pdo = (new Conexion())->conectar();
        $allusers = (new Client())->getClients($pdo);
        if (file_exists("src/views/$view.php")) { 
            require_once "src/views/$view.php";
        } else {
            require_once "src/views/404.php";
        }
    } catch (Throwable $th) {
        require_once "src/views/404.php";
    }
?>

<section class = profile>
    <div class="container-profile">
        <h2 class="header-profile">
            <span></span> Administrador de usuarios
        </h2>
        <div class="profile-card">
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
                <?php foreach ($allusers as $user) { ?>
                    <tr>
                        <td>ID: <?= $user->getId() ?></td>
                        <td><?= $user->getName() ?></td>
                        <td><?php if($user->getAdmin()){echo "Administrador";} else {echo "Usuario";} ?></td>
                        <td>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>  
    </div>
</section>