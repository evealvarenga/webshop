<?php
$error = $_GET["error"] ?? "";

$id = $_GET["id"] ?? 0;
$product = (new Product())->getProductById($pdo, $id);

?>
<?php if( strlen($error) > 0 ){ ?>
<span class="text-center text-danger" >
    <?= $error ?>
</span>
<?php } ?>
<form action="actions/nuevo_Product_acc.php" method="POST" enctype="multipart/form-data">
    <div>
        <label>Nombre:</label>
        <input
            type="text"
            name="name"
            minlength="3"
            maxlength="50"
            pattern="[A-Za-z0-9\s]+"
            title="Solo se aceptan letras o espacios"
            value="<?= $product->name ?>"
            required>   
    </div>
    <div>
        <label>Precio:</label>
        <input type="text" name="price" minlength="3" maxlength="50" required value="<?=  $product->getPrice() ?>">
    </div>
    <div>
        <label>Categoria:</label>
        <input type="text" name="category" minlength="3" maxlength="50" required value="<?= $product->category ?>">
    </div>
    <div>
        <label>Descripcion:</label>
        <input type="text" name="descrition" minlength="3" required value="<?=  $product->description?>">
    </div>
    <div>
        <label>Imagen:</label>
        <input type="file" name="img" required>
    </div>
    <button type="submit">Guardar</button>
</form>