<?php if (session_status() === PHP_SESSION_NONE) {session_start();}?>
<?php 
    $user = (new Client()) -> getClientByEmail($pdo, $_SESSION["user"]["email"]);
    $product = (new Product()) -> getProductById($pdo, $user->getFP());
?>
<section class = profile>
<?php if (isAdmin()) { ?>
    <div class="form">
        <div class="menu">
            <ul>
                <li>Modificar productos</li>
                <li>Lista de usuarios</li>
                <li>Modificar perfil propio</li>
            </ul>
        </div>
        <div class="main-content">
            <h1>Perfil de administrador</h1> 
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
                    <button class="camera">
                        <i class="bi bi-camera-fill"></i>
                    </button>
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
                <button class="btn-edit">
                    <i class="bi bi-pencil-fill"></i>
                    Editar perfil
                </button>
            </div>
        </div>
    </div>
<?php } ?>
</section>