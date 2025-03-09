<?php
require_once __DIR__ . "/../path.php";
require_once SITE_ROOT . "/controllers/ProdutoController.php";
$controller = new ProdutoController();
$produtos = $controller->index();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include('navbar.php') ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                        <h4>Lista de produtos
                            <a href="create.php" class="btn btn-primary float-end">Cadastrar Produto</a>
                        </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>Preço</th>
                                            <th>Estoque</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($produtos as $produto):
                                        ?>
                                            <tr>
                                                <td><?= $produto["nome"] ?></td>
                                                <td><?= $produto["descricao"] ?></td>
                                                <td><?= number_format($produto["preco"], 2, ",", ".") ?></td>
                                                <td><?= $produto["estoque"] ?></td>
                                                <td>
                                                    <a href="edit.php?id=<?= $produto["id"] ?>" class="btn btn-warning btn-sm m-1">Editar</a>
                                                    <a href="delete.php?id=<?= $produto["id"] ?>" onClick="return confirm('Tem certeza?')" class="btn btn-danger btn-sm m-1">Excluir</a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>