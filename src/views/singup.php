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
        <form>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputGrid" placeholder="Juan" >
                        <label for="floatingInputGrid">Nombre</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputGrid" placeholder="Pérez">
                        <label for="floatingInputGrid">Apellido</label>
                    </div>
                </div>
            </div>
            <div class="form-floating g-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Correo</label>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Constraseña</label>
                <input type="password" class="form-control" id="floatingInputGrid">
            </div>
            <div class="mb-3">
                <label for="fechaInicio" class="form-label">Fecha de nacimiento:</label>
                <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Bebida favorita</label>
                <select class="form-select" id="inputGroupSelect01">
                    <?php foreach ($allProducts as $product) { 
                        if($product->category != "Pastelería"){?>
                            <option value="<?= $product->id ?>"><?= $product->name ?></option>
                    <?php }} ?>
                </select>
            </div>
        </form>
    </div>
</div>