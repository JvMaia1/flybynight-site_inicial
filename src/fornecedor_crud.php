<?php
// src /fornecedores_crud.php

// Todas as funções criadas neste arquivo precisarão do script de conexão
require_once "conecta.php";

// Usada em fornecedores/listar.php
function buscarFornecedores(PDO $conexao){
    // montando comando sql
    $sql = "SELECT * FROM fornecedores";

    //executando comando
    $consulta = $conexao->query($sql);

    return $consulta->fetchAll();

}