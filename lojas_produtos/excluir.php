<?php
require_once "../src/loja_produto_crud.php";

$idLoja = filter_var($_GET['idLoja'], FILTER_SANITIZE_NUMBER_INT);
$idProduto = filter_var($_GET['idProduto'], FILTER_SANITIZE_NUMBER_INT);
excluirProdutoLoja($conexao, $idLoja, $idProduto);
header("location:listar.php");
exit;