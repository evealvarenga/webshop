<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="src/assets/favicom-logo.webp" style="max-width: 50px;" alt="" srcset=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?page=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?page=products">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?page=about">Sobre Oh!Tea</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?page=contact">Contacto</a>
        </li>
        <!--
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        -->
      </ul>
        <?php if (isset($_SESSION["user"])) { ?>
          <div class="btn-group dropstart">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-lines-fill"></i>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" aria-current="page" href="index.php?page=profile">Perfil</a></li>
              <li><a class="dropdown-item" href="src/controllers/client.controller.php?action=logout">Cerrar sesión</a></li>
            </ul>
          </div>
        <?php } else { ?>
          <a class="nav-link active" aria-current="page" href="index.php?page=login"><button class="btn btn-outline-success" type="submit"><i class="bi bi-person"></i></button></a>
        <?php } ?>
        <!--<a class="nav-link active" aria-current="page" href="index.php?page=login"><button class="btn btn-outline-success" type="submit"><i class="bi bi-person"></i></button></a>-->
    </div>
  </div>
</nav>