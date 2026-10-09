<?php
require_once "../src/lojas_crud.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    excluirLoja($conexao, $id);
    header("location:listar.php");
    exit;
}