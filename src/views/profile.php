<?php if (session_status() === PHP_SESSION_NONE) {session_start();}?>

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
    <div class="form">
        <div class="menu">
            <ul>
                <li>Modificar perfil</li>
            </ul>
        </div>
        <div class="main-content">
            <h1>Perfil de usuario</h1>  
        </div>
    </div>
<?php } ?>
</section>