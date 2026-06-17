<form action="src/controllers/product.controller.php?action=newProduct" method="POST" enctype="multipart/form-data">
    <div>
        <label>Nombre:</label>
        <input
            type="text"
            name="name"
            minlength="3"
            maxlength="50"
            pattern="[A-Za-z0-9áéíóúÁÉÍÓÚñÑ\s]+"
            title="Solo se aceptan letras o espacios"
            required>   
    </div>
    <div>
        <label>Precio:</label>
        <input type="text" name="price" minlength="3" maxlength="50" required>
    </div>
    <div>
        <label>Categoria:</label>
        <input type="text" name="category" minlength="3" maxlength="50" required>
    </div>
    <div>
        <label>Descripcion:</label>
        <input type="text" name="description" minlength="3" required>
    </div>
    <div>
        <label>Imagen:</label>
        <input type="file" name="img" required>
    </div>
    <button type="submit">Guardar</button>
</form>