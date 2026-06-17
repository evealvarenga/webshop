<?php

$id = $_GET["id"] ?? 0;
$product = (new Product())->getProductById($pdo, $id);
?>
<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow-sm p-4" style="width: 500px;">
        <h2 class="mb-4 text-center" >Borrar producto?</h2>
        <p class="card-title text-center" ><?= $product->name ?></p>
        <div class="d-flex justify-content-center gap-3 mb-3" >
            <img src="src/assets/products/<?= $product->img ?>" width="200px" alt="">
        </div>
        <form action="src/controllers/product.controller.php?action=deleteProduct" method="POST" enctype="multipart/form-data" class="d-flex justify-content-center gap-3">
            <input type="hidden" name="id" value="<?= $product->id ?>">
            <button type="submit" class="btn btn-danger">Si</button>
            <a href="index.php" class="btn btn-success">No</a>
        </form>
    </div>
</div>