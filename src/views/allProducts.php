<section class = profile>
    <div class="container-profile">
        <h2 class="header-profile">
            <span></span> Administrador de productos
        </h2>
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
            <?php foreach ($products as $product) { ?>
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
</section>