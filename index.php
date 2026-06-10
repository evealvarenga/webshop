<?php 

require_once "src/config/bd.php";
require_once "src/service/product.service.php";

$page = $_GET["pagina"] ?? 1;
//$view = $_GET["page"] ?? "productos";

try {
    $pdo = (new Conexion())->conectar();
    //$productos = (new Producto())->getProductosByPage($page, 3, $pdo);
    //$totalPaginas = ceil(count((new Producto())->getProductos($pdo)) / 3);
} catch (Exception $e) {
    echo $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <?php require_once "src/views/components/navbar.php" ?>
    

    <?php require_once "src/views/components/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>