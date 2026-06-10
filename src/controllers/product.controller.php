<?php
// NUEVO
require_once "./config/bd.php";
require_once "../class/product.php";

public function newProduct(){
    $name = htmlspecialchars(trim($_POST["name"]));
    $price = htmlspecialchars(trim($_POST["price"]));
    $category = htmlspecialchars(trim($_POST["category"]));
    $description = htmlspecialchars(trim($_POST["description"]));
    // img
    $tmp_name = $_FILES["img"]["tmp_name"];
    $original_name = $_FILES["img"]["name"];

    try {
        if( strlen($name) == 0 || strlen($price) == 0 || strlen($category) == 0 || strlen($description) == 0 ){
            throw new Exception("El campo ... esta vacio");
        }

        $pdo = (new Conexion())->conectar();

        $img = uniqid()."-".$original_name;

        move_uploaded_file($tmp_name, "../img/products/$img");

        $product = new Product();
        $product->name = $name;
        $product->setPrice($price);
        $product->category = $category;
        $product->description = $description;
        $product->img = $img;
        $product->guardar($pdo);

        header("Location: ../index.php");
    } catch (Exception $e) {
        header("Location: ../index.php?page=nuevo_product&error=No se pudo agregar el product");

    }
}


// MODIFICAR

public function changeProduct(){
    $name = htmlspecialchars(trim($_POST["name"]));
    $price = htmlspecialchars(trim($_POST["price"]));
    $category = htmlspecialchars(trim($_POST["category"]));
    $description = htmlspecialchars(trim($_POST["description"]));
    $id = htmlspecialchars(trim($_POST["id"]));
    // img

    try {
        if (strlen($name) == 0 || strlen($price) == 0 || strlen($category) == 0 || strlen($description) == 0) {
            throw new Exception("El campo ... esta vacio");
        }

        $pdo = (new Conexion())->conectar();
        $product = (new product())->getproductById($pdo, $id);
        $product->name = $name;
        $product->setprice($price);
        $product->category = $category;
        $product->description = $description;

        if (!empty($_FILES["img"]["tmp_name"])) {
            $tmp_name = $_FILES["img"]["tmp_name"];
            $original_name = $_FILES["img"]["name"];

            $img = uniqid() . "-" . $original_name;

            move_uploaded_file($tmp_name, "../img/products/$img");

            if (!empty($product->img) && file_exists("../img/products/" . $product->img) && !unlink("../img/products/" . $product->img)) {
                throw new Exception("No se pudo borrar");
            }

            $product->img = $img;
        }

        $product->editar($pdo);
        header("Location: ../index.php");
    } catch (Exception $e) {
        header("Location: ../index.php?page=modificar_product&error=No se pudo editar el product");
    }
}


// BORRAR

public function deleteProduct(){
    $id = $_GET["id"] ?? 0;
    // $id = isset($_GET["id"]) ? $_GET["id"] : 0; 

    try {
        $pdo = (new Conexion())->conectar();

        $product = (new product())->getproductById($pdo, $id);
        if( !empty($product) ){
            $product->borrar($pdo);
        }

        header("Location: ../index.php");
        exit();
    } catch (Exception $e) {
        header("Location: ../index.php"); // TODO Falta devolver el error en algun lado
    }
}