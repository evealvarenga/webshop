<?php
// NUEVO
require_once "./config/bd.php";
require_once "../class/Producto.php";

public function newProduct(){
    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    $precio = htmlspecialchars(trim($_POST["precio"]));
    $categoria = htmlspecialchars(trim($_POST["categoria"]));
    $descripcion = htmlspecialchars(trim($_POST["descripcion"]));
    // imagen
    $tmp_name = $_FILES["imagen"]["tmp_name"];
    $original_name = $_FILES["imagen"]["name"];

    try {
        if( strlen($nombre) == 0 || strlen($precio) == 0 || strlen($categoria) == 0 || strlen($descripcion) == 0 ){
            throw new Exception("El campo ... esta vacio");
        }

        $pdo = (new Conexion())->conectar();

        $imagen = uniqid()."-".$original_name;

        move_uploaded_file($tmp_name, "../img/productos/$imagen");

        $producto = new Producto();
        $producto->nombre = $nombre;
        $producto->setPrecio($precio);
        $producto->categoria = $categoria;
        $producto->descripcion = $descripcion;
        $producto->imagen = $imagen;
        $producto->guardar($pdo);

        header("Location: ../index.php");
    } catch (Exception $e) {
        header("Location: ../index.php?page=nuevo_producto&error=No se pudo agregar el producto");

    }
}


// MODIFICAR

public function changeProduct(){
    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    $precio = htmlspecialchars(trim($_POST["precio"]));
    $categoria = htmlspecialchars(trim($_POST["categoria"]));
    $descripcion = htmlspecialchars(trim($_POST["descripcion"]));
    $id = htmlspecialchars(trim($_POST["id"]));
    // imagen

    try {
        if (strlen($nombre) == 0 || strlen($precio) == 0 || strlen($categoria) == 0 || strlen($descripcion) == 0) {
            throw new Exception("El campo ... esta vacio");
        }

        $pdo = (new Conexion())->conectar();
        $producto = (new Producto())->getProductoById($pdo, $id);
        $producto->nombre = $nombre;
        $producto->setPrecio($precio);
        $producto->categoria = $categoria;
        $producto->descripcion = $descripcion;

        if (!empty($_FILES["imagen"]["tmp_name"])) {
            $tmp_name = $_FILES["imagen"]["tmp_name"];
            $original_name = $_FILES["imagen"]["name"];

            $imagen = uniqid() . "-" . $original_name;

            move_uploaded_file($tmp_name, "../img/productos/$imagen");

            if (!empty($producto->imagen) && file_exists("../img/productos/" . $producto->imagen) && !unlink("../img/productos/" . $producto->imagen)) {
                throw new Exception("No se pudo borrar");
            }

            $producto->imagen = $imagen;
        }

        $producto->editar($pdo);
        header("Location: ../index.php");
    } catch (Exception $e) {
        header("Location: ../index.php?page=modificar_producto&error=No se pudo editar el producto");
    }
}


// BORRAR

public function deleteProduct(){
    $id = $_GET["id"] ?? 0;
    // $id = isset($_GET["id"]) ? $_GET["id"] : 0; 

    try {
        $pdo = (new Conexion())->conectar();

        $producto = (new Producto())->getProductoById($pdo, $id);
        if( !empty($producto) ){
            $producto->borrar($pdo);
        }

        header("Location: ../index.php");
        exit();
    } catch (Exception $e) {
        header("Location: ../index.php"); // TODO Falta devolver el error en algun lado
    }
}