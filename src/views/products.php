<?php foreach ($products as $product) { ?>
  <div class="card" style="width: 18rem;">
    <img class="img-fluid" style="max-width: 100px;" src="src/assets/products/<?= $product->img ?>" alt="">
    <div class="card-body">
      <h5 class="card-title"><?= $product->name ?></h5>
      <p class="card-text"><?= $product->getPrice() ?></p>
    </div>
    
    <ul class="list-group list-group-flush">
      <a class="btn btn-warning" href="index.php?page=modificar_product&id=<?= $product->id ?>">Modificar</a>
      <a class="btn btn-danger" href="index.php?page=borrar_product&id=<?= $product->id ?>">Borrar</a>
    </ul>
    <div class="card-body">
      <a href="#" class="card-link"><a class="btn btn-primary" href="index.php?page=Detalle&id=<?= $product->id ?>">Ver</a></a>
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