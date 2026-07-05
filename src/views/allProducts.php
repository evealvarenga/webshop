<?php 
    try {
        $pdo = (new Conexion())->conectar();
        $allProducts = (new Product())->getProducts($pdo);
        if (file_exists("src/views/$view.php")) { 
            require_once "src/views/$view.php";
        } else {
            require_once "src/views/404.php";
        }
    } catch (Throwable $th) {
        require_once "src/views/404.php";
    }
?>

<section class = profile>
    <div class="container-profile">
        <h2 class="header-profile">
            <span></span> Administrador de productos
        </h2>
        <div class="profile-card"> 
            <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allProducts as $product) { ?>
                    <tr>
                        <td>
                            <img class="img-fluid" style="max-width: 100px;" src="src/assets/products/<?= $product->img ?>" alt="">
                        </td>
                        <td><?= $product->name ?></td>
                        <td><?= $product->getPrice() ?></td>
                        <td><?= $product->category ?></td>
                        <!-- <td><?= $product->cescription ?></td> -->
                        <td>
                            <a href="index.php?page=changeProduct&id=<?= $product->id ?>" class="btn-products"><i class="bi bi-gear"></i></a>
                            <a href="index.php?page=deleteProduct&id=<?= $product->id ?>" class="btn-products"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table> 
    </div> 
    </div>
</section>