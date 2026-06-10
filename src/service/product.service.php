<?php

class Producto
{
    public $id;
    public $nombre;
    private $precio;
    public $imagen;
    public $categoria;
    public $descripcion;

    public function getProductosByPage($pagina, $cantidad, $pdo)
    {
        $offset = ( $pagina - 1 ) * $cantidad;
        $sql = "SELECT * FROM productos LIMIT $cantidad OFFSET $offset";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $productos = $stmt->fetchAll(PDO::FETCH_CLASS, Producto::class);
        return $productos;
    }

    public function getProductos($db)
    {
        $sql = "SELECT * FROM productos";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $productos = $stmt->fetchAll(PDO::FETCH_CLASS, Producto::class);
        return $productos;
    }

    public function getProductoById($db, $id)
    {
        $sql = "SELECT * FROM productos WHERE id = $id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Producto::class);
        $producto = $stmt->fetch();
        return $producto;
    }

    public function guardar($pdo)
    {
        $sql = "INSERT INTO `productos` (`id`, `nombre`, `precio`, `imagen`, `categoria`, `descripcion`) VALUES (NULL, :nombre, :precio, :imagen, :categoria, :descripcion)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":nombre" => $this->nombre,
            ":precio" => $this->precio,
            ":imagen" => $this->imagen,
            ":categoria" => $this->categoria,
            ":descripcion" => $this->descripcion
        ]);
    }

    public function borrar($pdo)
    {
        if (!empty($this->imagen) && file_exists("../img/productos/" . $this->imagen) && !unlink("../img/productos/" . $this->imagen)) {
            throw new Exception("No se pudo borrar");
        }
        $sql = "DELETE FROM `productos` WHERE `productos`.`id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":id" => $this->id
        ]);
    }

    public function editar($pdo)
    {
        $sql = "UPDATE `productos` SET `nombre` = :nombre, `precio` = :precio, `imagen` = :imagen, `categoria` = :categoria, `descripcion` = :descripcion WHERE `productos`.`id` = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":nombre" => $this->nombre,
            ":precio" => $this->precio,
            ":imagen" => $this->imagen,
            ":categoria" => $this->categoria,
            ":descripcion" => $this->descripcion,
            ":id" => $this->id
        ]);
    }

    public function getPrecio($flag = true)
    {
        return $flag ? "$" . number_format($this->precio, 2, ",", ".") : $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }
}