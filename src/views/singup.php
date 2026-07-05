<?php 
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

<div class="form">
    <div class="form-carga-modf">
        <h1>Crear un nuevo usuario</h1>
        <form action="src/controllers/client.controller.php?action=newClient" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" id="floatingInputGrid">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">DNI</label>
                <input type="number" name="dni" class="form-control" id="floatingInputGrid">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Correo</label>
                <input type="email" name="email" class="form-control" id="floatingInputGrid">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Constraseña</label>
                <input type="password" name="password" class="form-control" id="floatingInputGrid">
            </div>
            <div class="mb-3">
                <label for="fechaInicio" class="form-label">Fecha de nacimiento:</label>
                <input type="date" name="birthday" class="form-control" id="fechaInicio" name="fechaInicio">
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
            <button type="submit">Crear cuenta</button>
        </form>
    </div>
</div>