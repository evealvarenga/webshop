<?php

require_once "../config/bd.php";
require_once "../service/client.service.php";


class ClientController {

    public function newClient($name, $dni, $email, $password, $birthday, $favProduct) {

        try {
            if( strlen($name) == 0 || strlen($email) == 0 || strlen($password) == 0 || strlen($birthday) == 0 || strlen($favProduct) == 0){
                throw new Exception("Uno de los campos está vacio");
            }

            $pdo = (new Conexion())->conectar();
            
            $client = new Client();
            $client-> name = $name;
            $client-> dni = $dni;
            $client-> email = $email;
            $client-> password = $password;
            $client-> birthday = $birthday;
            $client-> favProduct = $favProduct;

            
            $client-> guardar($pdo);
            login($email,$password);
            exit();
        } catch (Exception $e) {
            header("Location: /www/webshop/index.php?page=404&error=No se pudo crear el usuario.");
            exit();
        }
    }

    public function login($email, $password){
        if (session_status() === PHP_SESSION_NONE) {session_start();}
        $pdo = (new Conexion())->conectar();
        $client = ( new Client() )->getClientByEmail($pdo, $email);

        if ($client && $client->getPassword() == $password) {
            $_SESSION["user"] = [
                "email" => $client->getEmail(),
                "admin" => $client->getAdmin()
            ];
            
            header("Location: /www/webshop/index.php?page=profile");
        } else {
            header("Location: /www/webshop/index.php?page=404&error=Usuario o contraseña incorrecto");
        }


    }

    public function logout(){
        if (session_status() === PHP_SESSION_NONE) {session_start();}
        date_default_timezone_set("America/Argentina/Buenos_Aires");

        unset($_SESSION["user"]);
        session_destroy();

        header("Location: /www/webshop/index.php?page=login");
    }
    /*
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
        
    }*/
}



$controller = new ClientController();
$action = $_GET['action'] ?? '';

switch ($action) {
    case 'newClient':
        $name = htmlspecialchars(trim($_POST["name"]));
        $dni = htmlspecialchars(trim($_POST["dni"]));
        $email = htmlspecialchars(trim($_POST["email"]));
        $password = htmlspecialchars(trim($_POST["password"]));
        $birthday = htmlspecialchars(trim($_POST["birthday"]));
        $favProduct = htmlspecialchars(trim($_POST["favProduct"]));

        $controller->newClient($name, $dni, $email, $password, $birthday, $favProduct);
        break;
    case 'deleteClient':
        $controller->deleteClient();
        break;
    case 'login':
        $email = htmlspecialchars(trim($_POST["email"]));
        $password = htmlspecialchars(trim($_POST["password"]));

        $controller->login($email, $password);
    break;
    case 'logout':
        $controller->logout();
    break;
    case 'updateClient':
        $name = htmlspecialchars(trim($_POST["name"]));
        $name = htmlspecialchars(trim($_POST["dni"]));
        $email = htmlspecialchars(trim($_POST["email"]));
        $password = htmlspecialchars(trim($_POST["password"]));
        $birthday = htmlspecialchars(trim($_POST["birthday"]));
        $favProduct = htmlspecialchars(trim($_POST["favProduct"]));

        $controller->updateClient($name, $dni, $email, $password, $birthday, $favProduct);
        break;
    default:
        die("Acción no válida");
}