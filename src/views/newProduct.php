<?php
$error = $_GET["error"] ?? ""
?>
<?php if( strlen($error) > 0 ){ ?>
<span class="text-center text-danger" >
    <?= $error ?>
</span>
<?php } ?>
<form action="src/controllers/product.controller.php?action=newProduct" method="POST" enctype="multipart/form-data">
    <div>
        <label>Nombre:</label>
        <input
            type="text"
            name="nombre"
            minlength="3"
            maxlength="50"
            pattern="[A-Za-z0-9\s]+"
            title="Solo se aceptan letras o espacios"
            required>   
    </div>
    <div>
        <label>Precio:</label>
        <input type="text" name="precio" minlength="3" maxlength="50" required>
    </div>
    <div>
        <label>Categoria:</label>
        <input type="text" name="categoria" minlength="3" maxlength="50" required>
    </div>
    <div>
        <label>Descripcion:</label>
        <input type="text" name="descripcion" minlength="3" required>
    </div>
    <div>
        <label>Imagen:</label>
        <input type="file" name="imagen" required>
    </div>
    <button type="submit">Guardar</button>
</form>