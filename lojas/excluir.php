<?php
require_once "../src/lojas_crud.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_GET['id'];
    excluirLoja($conexao, $id);
    header("location:listar.php");
    exit;
}