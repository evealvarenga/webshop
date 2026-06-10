<?php foreach ($productos as $producto) { ?>
  <div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?= $producto->nombre ?></h5>
      <p class="card-text"><?= $producto->getPrecio() ?></p>
    </div>
    
    <ul class="list-group list-group-flush">
      <li class="list-group-item"></li>
      <li class="list-group-item"><a class="btn btn-warning" href="index.php?page=modificar_producto&id=<?= $producto->id ?>">Modificar</a></li>
      <li class="list-group-item"><a class="btn btn-danger" href="index.php?page=borrar_producto&id=<?= $producto->id ?>">Borrar</a></li>
    </ul>
    <div class="card-body">
      <a href="#" class="card-link">Card link</a>
      <a href="#" class="card-link"><a class="btn btn-primary" href="index.php?page=Detalle&id=<?= $producto->id ?>">Ver</a></a>
    </div>
  </div>
<?php } ?>
<div class="d-flex justify-content-center">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item"><a class="page-link <?= $page > 1 ? '' : 'disabled' ?>" href="index.php?pagina=<?= $page - 1 ?>">Previous</a></li>
            <?php for( $i = 1; $i <= $totalPaginas ; $i++ ){ ?>
                <li class="page-item"><a class="page-link" href="index.php?pagina=<?= $i ?>"><?= $i ?></a></li>
            <?php } ?>
            <li class="page-item"><a class="page-link <?= ($totalPaginas - 1) >= $page ? '' : 'disabled' ?>" href="index.php?pagina=<?= $page + 1 ?>">Next</a></li>
        </ul>
    </nav>
</div>