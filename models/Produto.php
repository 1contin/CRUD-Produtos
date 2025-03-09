<?php
require_once __DIR__ . "/../path.php";
require_once SITE_ROOT . "/config/Database.php";
class Produto
{
    private $conn;
    private $table = "produtos";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create($nome, $descricao, $preco, $estoque)
    {
        $sql = "INSERT INTO " . $this->table . " (nome, descricao, preco, estoque) VALUES (:nome, :descricao, :preco, :estoque)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ":nome" => $nome,
            ":descricao" => $descricao,
            ":preco" => $preco,
            ":estoque" => $estoque
        ]);
    }

    public function read()
    {
        $sql = "SELECT * FROM " . $this->table . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function update($id, $nome, $descricao, $preco, $estoque)
    {
        $sql = "UPDATE " . $this->table . " SET nome = :nome, descricao = :descricao, preco = :preco, estoque = :estoque WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ":id" => $id,
            ":nome" => $nome,
            ":descricao" => $descricao,
            ":preco" => $preco,
            ":estoque" => $estoque
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([":id" => $id]);
    }
}
