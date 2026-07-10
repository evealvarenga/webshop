<div class="container-profile">
    <h2 class="header-profile">
        <span></span> Iniciar sesión
    </h2>
    <div class="profile-card">
      <form method="POST" action="src/controllers/client.controller.php?action=login">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Nunca compartiremos tu mail con nadie más.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Constraseña</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
          <small><a href="index.php?page=singup">Crear una cuenta</a></small>
        </div>
        <button type="submit" class= "btn-edit">Iniciar sesión</button>
      </form>
  </div>
</div>