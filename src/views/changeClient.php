<?php if (!isset($_SESSION["user"])) {header("Location: /www/webshop/index.php?page=404&error=No has iniciado sesión con tu cuenta."); exit;}?>
<?php

$id = $_GET["id"] ?? 0;
$client = (new Client())->getClientById($pdo, $id);

try {
    $pdo = (new Conexion())->conectar();
    $allProducts = (new Product())->getProducts($pdo);
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
            <span></span> Modificar usuario
        </h2>
        <div class="profile-card">
            <form action="src/controllers/client.controller.php?action=updateClient" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $client->id ?>">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombre:</label>
                    <input
                        type="text"
                        class="form-control"
                        name="name"
                        minlength="3"
                        maxlength="50"
                        pattern="[A-Za-z0-9áéíóúÁÉÍÓÚñÑ\s]+"
                        title="Solo se aceptan letras o espacios"
                        value="<?= $client->name ?>"
                        required>   
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Correo:</label>
                    <input type="email" class="form-control" name="email" minlength="3" maxlength="50" required value="<?=  $client->email ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" name="password" minlength="3" maxlength="50" required value="<?= $client->password ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">DNI:</label>
                    <input type="number" class="form-control" name="dni" minlength="3" required value="<?=  $client->dni?>">
                </div>
                <div class="mb-3">
                    <label for="fechaInicio" class="form-label">Fecha de nacimiento:</label>
                    <input type="date" name="birthday" class="form-control" id="fechaInicio" name="fechaInicio" require value="<?=  $client->birthday?>">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Bebida favorita</label>
                    <select class="form-select" id="inputGroupSelect01" name="favProduct">
                        <?php foreach ($allProducts as $product) {
                            if ($product->category != "Pastelería") { ?>
                                <option value="<?= $product->id ?>">
                                    <?= $product->name ?>
                                </option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <button type="submit" class="btn-edit">Guardar</button>
            </form>
    </div>  
    </div>
</section>