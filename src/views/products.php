<?php
if (session_status() === PHP_SESSION_NONE) {session_start();}

if(isset($_SESSION['toast'])):
    $toast = $_SESSION['toast'];
?>
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


<section class="hero-products-matcha">
    <div class="container">
        <div class="hero-products-content">

            <h1>
                <span class="title-main-products">Macha Latte</span><br>
                <span class="title-secondary-products">con perlas de tapioca</span>
            </h1>
            <p>
                Un cremoso latte que combina
                el rico y té <strong>Matcha</strong>
                con <strong>leche</strong>.
            </p>
            <a href="index.php?page=detailProduct&id=11" class="btn-hero-products">Ver producto → </a>
        </div>
    </div>
</section>
    <a href="index.php?page=newProduct" class="btn-new-products"> Crear nuevo producto →</a>
<div class="container text-center p-5">
  <div class="row row-cols-1 row-cols-md-3 g-4">
  <?php foreach ($products as $product) { ?>
  <div class="col">
    <div class="card" style="width: 18rem;">
      <center><img class="img-fluid" style="max-width: 100px;" src="src/assets/products/<?= $product->img ?>" alt=""></center>
      <div class="card-body">
        <h5 class="card-title"><?= $product->name ?></h5>
        <p class="card-text"><?= $product->getPrice(true) ?></p>
      </div>
        
      <ul class="list-group list-group-flush ">
        <div class="btn-group justify-content-center" role="group" aria-label="Basic mixed styles example">
          <a href="index.php?page=changeProduct&id=<?= $product->id ?>" class="btn-products"><i class="bi bi-gear"></i></a>
          <a href="index.php?page=deleteProduct&id=<?= $product->id ?>" class="btn-products"><i class="bi bi-trash3"></i></a>
        </div>
      </ul>
      <div class="card-body">
        <a href="index.php?page=detailProduct&id=<?= $product->id ?>" class="btn-products">Ver</a>
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
