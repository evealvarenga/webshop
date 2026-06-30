<?php

class Client
{
    public $id;
    public $name;
    public $email;
    public $dni;
    public $password;
    public $admin;
    public $birthday;
    public $favProduct;

    /** GETTERS **/
    public function getEmail(){return $this->email;}
    public function getPassword(){return $this->password;}
    public function getAdmin(){return $this->admin;}
    public function getId(){return $this->id;}

    /** SETTERS **/
    //@return  self
    public function setEmail($email){$this->email = $email;return $this;}
    //@return  self
    public function setPassword($password){$this->password = $password;return $this;}
    //@return  self
    public function setRol($rol){$this->rol = $rol;return $this;}

    /** FUNCIONES **/

    /*public function getClientsByPage($pagina, $cantidad, $pdo)
    {
        $offset = ( $pagina - 1 ) * $cantidad;
        $sql = "SELECT * FROM clients LIMIT $cantidad OFFSET $offset";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $clients = $stmt->fetchAll(PDO::FETCH_CLASS, Client::class);
        return $Clients;
    }
 */
    public function getClients($db)
    {
        $sql = "SELECT * FROM clients";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Client::class);
        $stmt->execute();

        $clients = $stmt->fetchAll();
        return $clients;
    }

    public function getClientByEmail($pdo, $email)
    {
        $sql = "SELECT * FROM clients WHERE email = '$email' ";
        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Client::class);
        $stmt->execute();
        $client = $stmt->fetch();

        return $client;
    }
   
    public function guardar($pdo)
    {
        $sql = "INSERT INTO `clients` (`id`, `name`, `email`, `dni`, `password`, `admin`, `birthday`, `favProduct`) VALUES (NULL, :name, :email, :dni, :password, '0', :birthday, :favProduct)";


        $stmt = $pdo->prepare($sql);
              
        $stmt->execute([
            ":name" => $this->name,
            ":email" => $this->email,
            ":dni" => $this->dni,
            ":password" => $this->password,
            ":birthday" => $this->birthday,
            ":favProduct" => $this->favProduct
        ]);
        
    }



    /*
    public function borrar($pdo)
    {
        if (!empty($this->img) && file_exists("../assets/products/" . $this->img) && !unlink("../assets/products/" . $this->img)) {
            throw new Exception("No se pudo borrar");
        }
        $sql = "DELETE FROM `products` WHERE `products`.`id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":id" => $this->id
        ]);
    }

    public function editar($pdo)
    {
        $sql = "UPDATE `products` SET `name` = :name, `price` = :price, `img` = :img, `category` = :category, `description` = :description WHERE `products`.`id` = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":name" => $this->name,
            ":price" => $this->price,
            ":img" => $this->img,
            ":category" => $this->category,
            ":description" => $this->description,
            ":id" => $this->id
        ]);
    }

    public function getPrice($flag = true)
    {
        return $flag ? "$" . number_format($this->price, 2, ",", ".") : $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }*/
}