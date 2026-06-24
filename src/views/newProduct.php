<div class="form">
    
<div class="form-carga-modf">
    <h1>Nuevo Producto</h1>
    <form action="src/controllers/product.controller.php?action=newProduct" method="POST" enctype="multipart/form-data">
        <div>
            <label for="exampleFormControlInput1" class="form-label">Nombre</label>
            <input
                type="text"
                class="form-control"
                name="name"
                minlength="3"
                maxlength="50"
                pattern="[A-Za-z0-9áéíóúÁÉÍÓÚñÑ\s]+"
                title="Solo se aceptan letras o espacios"
                required>   
        </div>
        <div>
            <label for="exampleFormControlInput1" class="form-label">Precio:</label>
            <input type="text" class="form-control" name="price" minlength="3" maxlength="50" required>
        </div>
        <div>
            <label for="exampleFormControlInput1" class="form-label">Categoria:</label>
            <input type="text" class="form-control" name="category" minlength="3" maxlength="50" required>
        </div>
        <div>
            <label for="exampleFormControlInput1" class="form-label">Descripcion:</label>
            <input type="text" class="form-control" name="description" minlength="3" required>
        </div>
        <div>
            <label for="exampleFormControlInput1" class="form-label">Imagen:</label>
            <input type="file" class="form-control" name="img" required>
        </div>
        <button type="submit">Guardar</button>
    </form>
</div>
</div>