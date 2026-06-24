<?php
$id = $_GET["id"] ?? 0;
$product = null;
try {
    $pdo =( new Conexion() )->conectar();
    $product = ( new Product() )->getProductById($pdo, $id);
} catch (Exception $e) {
    echo $e->getMessage();
}

?>
<?php if ($product) { ?>

<p class="category-info-descri" ><a href="index.php?page=products">Productos</a>/<?= $product->category ?></p>
<center>    
<div class="card mb-4" style="max-width: 80%;">
    <div class="row g-0">
        <div class="col-md-4">
        <img src="src/assets/products/<?= $product->img ?>" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title"><?= $product->name?></h5>
            <p class="card-text"><?= $product->getPrice() ?></p>
            <p class="card-text"><small class="text-body-secondary"><?= $product->description ?></small></p>
        </div>
        <div class="col-12 mt-3">
                <a class="btn btn-primary ms-3" href="index.php?page=products">Volver</a>
            </div>
        </div>
    </div>
    </div>
    </center>
<?php } else { ?>
    <h1>Producto no encontrado</h1>
    <a class="btn btn-primary ms-3" href="index.php?page=products">Volver</a>
<?php } ?>