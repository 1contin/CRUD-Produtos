<?php
require_once __DIR__ . "/../path.php";
require_once SITE_ROOT . "/controllers/ProdutoController.php";
$controller = new ProdutoController();

$id = $_GET['id'];
$produto = $controller->edit($id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->update($id);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include('navbar.php') ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar produto
                            <a href="index.php" class="btn btn-success float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="descricao" class="form-label">Descrição</label>
                                    <textarea class="form-control" id="descricao" name="descricao" rows="3" required><?= htmlspecialchars($produto['descricao']) ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="preco" class="form-label">Preço</label>
                                    <input type="number" class="form-control" id="preco" name="preco" value="<?= htmlspecialchars($produto['preco']) ?>" step="0.01" required>
                                </div>
                                <div class="mb-3">
                                    <label for="estoque" class="form-label">Estoque</label>
                                    <input type="number" class="form-control" id="estoque" name="estoque" value="<?= htmlspecialchars($produto['estoque']) ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>