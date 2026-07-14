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
    public function getName(){return $this->name;}
    public function getEmail(){return $this->email;}
    public function getDni(){return $this->dni;}
    public function getPassword(){return $this->password;}
    public function getAdmin(){return $this->admin;}
    public function getBD(){return $this->birthday;}
    public function getFP(){return $this->favProduct;}
    public function getId(){return $this->id;}

    /** SETTERS **/
    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email){$this->email = $email;return $this;}
    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password){$this->password = $password;return $this;}
    /**
     * Set the value of rol
     *
     * @return  self
     */
    public function setRol($rol){$this->rol = $rol;return $this;}

    /** FUNCIONES **/

    public function getClients($db)
    {
        $sql = "SELECT * FROM clients";
        $stmt = $db->prepare($sql);
        $stmt->execute();       

        $clients = $stmt->fetchAll(PDO::FETCH_CLASS, Client::class);
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

        public function getClientById($db, $id)
    {
        $sql = "SELECT * FROM clients WHERE id = $id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Client::class);
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

    public function borrar($pdo)
    {
        $sql = "DELETE FROM `clients` WHERE `clients`.`id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":id" => $this->id
        ]);
    }

    public function editar($pdo)
    {
        $sql = "UPDATE `clients` SET `name` = :name, `email` = :email, `dni` = :dni, `password` = :password, `birthday` = :birthday, `favProduct` = :favProduct WHERE `clients`.`id` = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":name" => $this->name,
            ":email" => $this->email,
            ":dni" => $this->dni,
            ":password" => $this->password,
            ":birthday" => $this->birthday,
            ":favProduct" => $this->favProduct,
            ":id" => $this->id
        ]);
    }

    public function upgradear($pdo)
    {
        $sql = "UPDATE `clients` SET `admin` = '1' WHERE `clients`.`id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":id" => $this->id
        ]);
    }
}