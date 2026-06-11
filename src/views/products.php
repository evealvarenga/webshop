<div class="container text-center p-5">
  <div class="row row-cols-1 row-cols-md-3 g-4">

  <?php foreach ($products as $product) { ?>
  <div class="col">
    <div class="card" style="width: 18rem;">
      <center><img class="img-fluid" style="max-width: 100px;" src="src/assets/products/<?= $product->img ?>" alt=""></center>
      <div class="card-body">
        <h5 class="card-title"><?= $product->name ?></h5>
        <p class="card-text"><?= $product->getPrice() ?></p>
      </div>
        
      <ul class="list-group list-group-flush">
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
          <a href="index.php?page=changeProduct&id=<?= $product->id ?>"><button type="button" class="btn btn-warning">Modificar</button></a>
          <a href="index.php?page=deleteProduct&id=<?= $product->id ?>"><button type="button" class="btn btn-danger">Borrar</button></a>
        </div>
      </ul>
      <div class="card-body">
        <a href="#" class="card-link"><a class="btn btn-primary" href="index.php?page=detailProduct&id=<?= $product->id ?>">Ver</a></a>
      </div>
    </div>
    </div>
  <?php } ?>
</div>
</div>


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
