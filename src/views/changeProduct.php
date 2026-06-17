<form action="src/controllers/product.controller.php?action=updateProduct" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $product->id ?>">
    <div>
        <label>Nombre:</label>
        <input
            type="text"
            name="name"
            minlength="3"
            maxlength="50"
            pattern="[A-Za-z0-9áéíóúÁÉÍÓÚñÑ\s]+"
            title="Solo se aceptan letras o espacios"
            value="<?= $product->name ?>"
            required>   
    </div>
    <div>
        <label>Precio:</label>
        <input type="text" name="price" minlength="3" maxlength="50" required value="<?=  $product->getPrice(false) ?>">
    </div>
    <div>
        <label>Categoria:</label>
        <input type="text" name="category" minlength="3" maxlength="50" required value="<?= $product->category ?>">
    </div>
    <div>
        <label>Descripcion:</label>
        <input type="text" name="description" minlength="3" required value="<?=  $product->description?>">
    </div>
    <div>
        <label>Imagen:</label>
        <input type="file" name="img">
    </div>
    <button type="submit">Guardar</button>
</form>