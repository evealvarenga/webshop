<?php if (!isset($_SESSION["user"])) {header("Location: /www/webshop/index.php?page=404&error=No has iniciado sesión con tu cuenta."); exit;}?>
<?php if (!isAdmin()) { header("Location: /www/webshop/index.php?page=404&error=No tienes permisos suficientes."); exit;}?>

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

<?php
if (session_status() === PHP_SESSION_NONE) {session_start();}
if(isset($_SESSION['toast'])): $toast = $_SESSION['toast'];?>

<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert">
        <div class="toast-header">
            <strong class="me-auto">Sistema</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            <?= $toast['message'] ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const toastElement = document.getElementById('liveToast');
    const toast = new bootstrap.Toast(toastElement);
    toast.show();
});
</script>
<?php
unset($_SESSION['toast']);
endif;
?>

<section class = profile>
    <div class="container-profile">
        <h2 class="header-profile">
            <span></span> Administrador de productos
        </h2>
        <div class="profile-card"> 
            <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allProducts as $product) { ?>
                    <tr>
                        <td>
                            <img class="img-fluid" style="max-width: 100px;" src="src/assets/products/<?= $product->img ?>" alt="">
                        </td>
                        <td><?= $product->name ?></td>
                        <td><?= $product->getPrice() ?></td>
                        <td><?= $product->category ?></td>
                        <!-- <td><?= $product->cescription ?></td> -->
                        <td>
                            <a href="index.php?page=changeProduct&id=<?= $product->id ?>" class="btn-products"><i class="bi bi-gear"></i></a>
                            <a href="index.php?page=deleteProduct&id=<?= $product->id ?>" class="btn-products"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table> 
    </div> 
    </div>
</section>