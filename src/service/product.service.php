<?php

class Product
{
    public $id;
    public $name;
    private $price;
    public $img;
    public $category;
    public $description;

    public function getProductsByPage($pagina, $cantidad, $pdo)
    {
        $offset = ( $pagina - 1 ) * $cantidad;
        $sql = "SELECT * FROM products LIMIT $cantidad OFFSET $offset";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $products = $stmt->fetchAll(PDO::FETCH_CLASS, Product::class);
        return $products;
    }

    public function getproducts($db)
    {
        $sql = "SELECT * FROM products";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $products = $stmt->fetchAll(PDO::FETCH_CLASS, Product::class);
        return $products;
    }

    public function getProductById($db, $id)
    {
        $sql = "SELECT * FROM products WHERE id = $id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Product::class);
        $producto = $stmt->fetch();
        return $producto;
    }

    public function guardar($pdo)
    {
        $sql = "INSERT INTO `products` (`id`, `name`, `price`, `img`, `category`, `description`) VALUES (NULL, :name, :price, :img, :category, :description)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":name" => $this->name,
            ":price" => $this->price,
            ":img" => $this->img,
            ":category" => $this->category,
            ":description" => $this->description
        ]);
    }

    public function borrar($pdo)
    {
        if (!empty($this->img) && file_exists("../img/products/" . $this->img) && !unlink("../img/products/" . $this->img)) {
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

    public function getPrice()
    {
        return "$" . number_format($this->price, 2, ",", ".");
    }

    public function setprice($price)
    {
        $this->price = $price;
    }
}