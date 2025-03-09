<?php
require_once __DIR__ . "/../path.php";
require_once SITE_ROOT . "/controllers/ProdutoController.php";

$controller = new ProdutoController();

$id = $_GET['id'];
$controller->delete($id);
?>
<script>
    window.location.href = 'index.php';
</script>