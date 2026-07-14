<?php if (!isset($_SESSION["user"])) {header("Location: /www/webshop/index.php?page=404&error=No has iniciado sesión con tu cuenta."); exit;}?>
<?php if (session_status() === PHP_SESSION_NONE) {session_start();}?>
<?php 
    $user = (new Client()) -> getClientByEmail($pdo, $_SESSION["user"]["email"]);
    $product = (new Product()) -> getProductById($pdo, $user->getFP());
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
<?php if (isAdmin()) { ?>
    <div class="container-profile">
        <h2 class="header-profile">
            <span></span> Perfil de administrador
        </h2>
        <div class="profile-card">
            <!-- Columna izquierda -->
            <div class="left">
                <a href="index.php?page=newProduct"><button class="btn-edit">
                    <i class="bi bi-pencil-fill"></i>
                    Crear nuevo producto
                </button></a>
                <a href="index.php?page=allProducts"><button class="btn-edit">
                    <i class="bi bi-pencil-fill"></i>
                    Administrar productos
                </button></a>
                <a href="index.php?page=allClients"><button class="btn-edit">
                    <i class="bi bi-pencil-fill"></i>
                    Verificar usuarios
                </button></a>
            </div>
            <!-- Columna derecha -->
            <div class="right">
                <div class="info">
                    <h4>Nombre</h4>
                    <p><?=$user->getName()?></p>
                </div>
                <div class="info">
                    <h4>Email</h4>
                    <p><?=$user->getEmail()?></p>
                </div>
                <div class="info">
                    <h4>Cumpleaños</h4>
                    <p><?=$user->getBD()?></p>
                </div>
                <div class="info">
                    <h4>Bebida favorita</h4>
                    <p><?=$product->getName()?></p>
                </div>
                <a href="index.php?page=changeClient&id=<?= $user->getId() ?>"><button class="btn-edit">
                    <i class="bi bi-pencil-fill"></i>
                    Editar perfil
                </button></a>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="container-profile">
        <h2 class="header-profile">
            <span></span> Perfil
        </h2>
        <div class="profile-card">
            <!-- Columna izquierda -->
            <div class="left">
                <div class="photo">
                    <img src="https://placehold.co/250x250" alt="Foto Perfil">
                </div>
            </div>
            <!-- Columna derecha -->
            <div class="right">
                <div class="info">
                    <h4>Nombre</h4>
                    <p><?=$user->getName()?></p>
                </div>
                <div class="info">
                    <h4>Email</h4>
                    <p><?=$user->getEmail()?></p>
                </div>
                <div class="info">
                    <h4>Cumpleaños</h4>
                    <p><?=$user->getBD()?></p>
                </div>
                <div class="info">
                    <h4>Bebida favorita</h4>
                    <p><?=$product->getName()?></p>
                </div>
                <a href="index.php?page=changeClient&id=<?= $user->getId() ?>"><button class="btn-edit">
                    <i class="bi bi-pencil-fill"></i>
                    Editar perfil
                </button></a>
            </div>
        </div>
    </div>
<?php } ?>
</section>