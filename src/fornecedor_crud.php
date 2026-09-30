<?php
// src /fornecedores_crud.php

// Todas as funções criadas neste arquivo precisarão do script de conexão
require_once "conecta.php";

// Usada em fornecedores/listar.php
function buscarFornecedores(PDO $conexao):array{
    // montando comando sql
    $sql = "SELECT * FROM fornecedores";

    //executando comando
    $consulta = $conexao->query($sql);

    return $consulta->fetchAll();
}

function inserirFornecedor(PDO $conexao, string $nome):void{
    $sql = "INSERT INTO fornecedores (nome) VALUES (:nome)";

    try {
        $xpto = $conexao->prepare($sql);
        
        $xpto->execute([
            ':nome' => $nome
        ]);
    } catch (PDOException $erro) {
        die("Erro ao inserir fornecedor:" . $erro->getMessage());
    }

}

function editarFornecedor(PDO $conexao, string $id, $nome):void{
    $sql = "ALTER TABLE fornecedores WHERE id = :id nome";
}

function buscarFornecedorPorId(PDO $conexao, int $id){
    $sql = "SELECT * FROM fornecedores WHERE id = :id";

    $consulta= $conexao->prepare($sql);

    $consulta->bindValue(":id", $id);

    $consulta->execute();

    return $consulta->fetch();

}