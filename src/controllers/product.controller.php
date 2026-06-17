<?php

require_once "../config/bd.php";
require_once "../service/product.service.php";


class ProductController {

    public function newProduct($name, $price, $category, $description, $tmp_name, $original_name) {

        try {
            if( strlen($name) == 0 || strlen($price) == 0 || strlen($category) == 0 || strlen($description) == 0 ){
                throw new Exception("Uno de los campos está vacio");
            }

            $pdo = (new Conexion())->conectar();

            $img = uniqid()."-".$original_name;
            move_uploaded_file($tmp_name, "../assets/products/$img");

            $product = new Product();
            $product-> name = $name;
            $product-> setPrice($price);
            $product-> category = $category;
            $product-> description = $description;
            $product-> img = $img;
            $product-> guardar($pdo);

            session_start();
            $_SESSION['toast'] = [
                'type' => 'success',
                'message' => 'Producto agregado correctamente'
            ];

            header("Location: /www/webshop/index.php");
            exit();
        } catch (Exception $e) {
            header("Location: /www/webshop/index.php?page=404&error=No se pudo agregar el producto");
            exit();
        }
    }

    public function deleteProduct() {
        $id = (int) ($_POST["id"] ?? 0);

        try {
            $pdo = (new Conexion())->conectar();

            $product = (new Product())->getProductById($pdo, $id);
            if( !empty($product) ){
                $product->borrar($pdo);
            }

            session_start();
            $_SESSION['toast'] = [
                'type' => 'success',
                'message' => 'Producto eliminado correctamente'
            ];

            header("Location: /www/webshop/index.php");
            exit();
        } catch (Exception $e) {
            die($e->getMessage());
            header("Location: /www/webshop/index.php?page=404&error=No se pudo eliminar el producto");
            exit();
        }
    }

    public function updateProduct($name, $price, $category, $description, $id, $tmp_name, $original_name) {
        try {
            if (strlen($name) == 0 || strlen($price) == 0 || strlen($category) == 0 || strlen($description) == 0) {
                throw new Exception("Uno de los campos está vacio");
            }

            $pdo = (new Conexion())->conectar();
            $product = (new product())->getProductById($pdo, $id);
            $product->name = $name;
            $product->setprice($price);
            $product->category = $category;
            $product->description = $description;

            if (!empty($_FILES["img"]["tmp_name"])) {
                $tmp_name = $_FILES["img"]["tmp_name"];
                $original_name = $_FILES["img"]["name"];

                $img = uniqid() . "-" . $original_name;

                move_uploaded_file($tmp_name, "../assets/products/$img");

                if (!empty($product->img) && file_exists("../assets/products/" . $product->img) && !unlink("../assets/products/" . $product->img)) {
                    throw new Exception("No se pudo borrar");
                }

                $product->img = $img;
            }

            $product->editar($pdo);

            session_start();
            $_SESSION['toast'] = [
                'type' => 'success',
                'message' => 'Producto modificado correctamente'
            ];
            
            header("Location: /www/webshop/index.php");
            exit();
        } catch (Exception $e) {
            header("Location: /www/webshop/index.php?page=404&error=No se pudo modificar el producto");
            exit();
        }
        
    }
}



$controller = new ProductController();
$action = $_GET['action'] ?? '';

switch ($action) {
    case 'newProduct':
        $name = htmlspecialchars(trim($_POST["name"]));
        $price = htmlspecialchars(trim($_POST["price"]));
        $category = htmlspecialchars(trim($_POST["category"]));
        $description = htmlspecialchars(trim($_POST["description"]));
        $tmp_name = $_FILES["img"]["tmp_name"];
        $original_name = $_FILES["img"]["name"];

        $controller->newProduct($name, $price, $category, $description, $tmp_name, $original_name);
        break;
    case 'deleteProduct':
        $controller->deleteProduct();
        break;
    case 'updateProduct':
        $name = htmlspecialchars(trim($_POST["name"]));
        $price = htmlspecialchars(trim($_POST["price"]));
        $category = htmlspecialchars(trim($_POST["category"]));
        $description = htmlspecialchars(trim($_POST["description"]));
        $id = htmlspecialchars(trim($_POST["id"]));
        $tmp_name = $_FILES["img"]["tmp_name"];
        $original_name = $_FILES["img"]["name"];

        $controller->updateProduct($name, $price, $category, $description, $id, $tmp_name, $original_name);
        break;
    default:
        die("Acción no válida");
}