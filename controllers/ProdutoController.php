<?php
require_once __DIR__ . "/../path.php";
require_once SITE_ROOT . "/models/Produto.php";

class ProdutoController
{
    private $produto;

    public function __construct()
    {
        $this->produto = new Produto();
    }

    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->produto->create($_POST["nome"], $_POST["descricao"], $_POST["preco"], $_POST["estoque"]);
            header("Location: index.php");
        }
    }

    public function index()
    {
        return $this->produto->read();
    }

    public function edit($id)
    {
        $produtos = $this->produto->read();
        foreach ($produtos as $produto) {
            if ($produto["id"] == $id) {
                return $produto;
            }
        }
        return null;
    }

    public function update($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->produto->update($id, $_POST["nome"], $_POST["descricao"], $_POST["preco"], $_POST["estoque"]);
            header("Location: index.php");
        }
    }

    public function delete($id)
    {
        $this->produto->delete($id);
        header("Location: index.php");
    }
}
