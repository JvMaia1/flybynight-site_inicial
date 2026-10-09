<?php
require_once "../src/produtos_crud.php";

$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
excluirProduto($conexao, $id);
header("location:listar.php");
exit;