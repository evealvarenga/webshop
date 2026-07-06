<?php if (!isset($_SESSION["user"])) {header("Location: /www/webshop/index.php?page=404&error=No has iniciado sesión con tu cuenta."); exit;}?>
<?php if (!isAdmin()) { header("Location: /www/webshop/index.php?page=404&error=No tienes permisos suficientes."); exit;}?>

<section class = profile>
    <div class="container-profile">
        <h2 class="header-profile">
            <span></span> Nuevo Producto
        </h2>
        <div class="profile-card">
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
            <button type="submit" class="btn-edit">Guardar</button>
        </form>
    </div>  
    </div>
</section>