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
            $this->login($email,$password);
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
    
    public function deleteClient() {
        $id = (int) ($_POST["id"] ?? 0);

        try {
            $pdo = (new Conexion())->conectar();

            $client = (new Client())->getClientById($pdo, $id);
            if( !empty($client) ){
                $client->borrar($pdo);
            }

            session_start();
            $_SESSION['toast'] = [
                'type' => 'success',
                'message' => 'Usuario eliminado correctamente'
            ];

            header("Location: /www/webshop/index.php?page=AllClients");
            exit();
        } catch (Exception $e) {
            die($e->getMessage());
            header("Location: /www/webshop/index.php?page=404&error=No se pudo eliminar el usuario");
            exit();
        }
    }

    public function updateClient($name, $id, $dni, $email, $password, $birthday, $favProduct) {
        try {
            
            if (strlen($name) == 0 || strlen($dni) == 0 || strlen($email) == 0 || strlen($password) == 0 || strlen($birthday) == 0 || strlen($favProduct) == 0) {
                throw new Exception("Uno de los campos está vacio");
            }
            
            $pdo = (new Conexion())->conectar();
            $client = (new Client())->getClientById($pdo, $id);
            $client->name = $name;
            $client->dni = $dni;
            $client->email = $email;
            $client->password = $password;
            $client->birthday = $birthday;
            $client->favProduct = $favProduct;

            
            $client->editar($pdo);

            session_start();
            $_SESSION['toast'] = [
                'type' => 'success',
                'message' => 'Usuario modificado correctamente'
            ];
            
            header("Location: /www/webshop/index.php?page=profile");
            exit();
        } catch (Exception $e) {
            header("Location: /www/webshop/index.php?page=404&error=No se pudo modificar el usuario");
            exit();
        }
        
    }

    public function upgradeClient() {
        $id = (int) ($_POST["id"] ?? 0);

        try {
            $pdo = (new Conexion())->conectar();

            $client = (new Client())->getClientById($pdo, $id);
            if( !empty($client) ){
                $client->upgradear($pdo);
            }

            session_start();
            $_SESSION['toast'] = [
                'type' => 'success',
                'message' => 'Usuario cambiado a administrador correctamente'
            ];

            header("Location: /www/webshop/index.php?page=AllClients");
            exit();
        } catch (Exception $e) {
            die($e->getMessage());
            header("Location: /www/webshop/index.php?page=404&error=No se pudo realizar la modificación del usuario");
            exit();
        }
    }
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
        $id = htmlspecialchars(trim($_POST["id"]));
        $name = htmlspecialchars(trim($_POST["name"]));
        $dni = htmlspecialchars(trim($_POST["dni"]));
        $email = htmlspecialchars(trim($_POST["email"]));
        $password = htmlspecialchars(trim($_POST["password"]));
        $birthday = htmlspecialchars(trim($_POST["birthday"]));
        $favProduct = htmlspecialchars(trim($_POST["favProduct"]));

        $controller->updateClient($name, $id, $dni, $email, $password, $birthday, $favProduct);
    break;
    case 'upgradeClient':
        $controller->upgradeClient();
    break;
    default:
        die("Acción no válida");
}