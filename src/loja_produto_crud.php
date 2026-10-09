<?php
require_once 'conecta.php';

function buscarLojasProdutos(PDO $conexao){
    $sql = 
        "SELECT 
        lojas_produtos.produto_id AS produto_id, 
        lojas_produtos.loja_id AS loja_id,
        lojas.nome AS loja_nome,
        produtos.nome AS produto_nome,
        lojas_produtos.estoque AS estoque
        FROM lojas_produtos 
        JOIN produtos ON lojas_produtos.produto_id = produtos.id
        JOIN lojas ON lojas_produtos.loja_id = lojas.id
        ORDER BY loja_nome, produto_nome;
    ";

    $consulta = $conexao->prepare($sql);
    $consulta->execute();

    return $consulta->fetchAll();
}

function buscarLojaProdutoPorId(PDO $conexao, int $id){
    $sql = "SELECT * FROM lojas_produtos WHERE id = :id";
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":id", $id);
    $consulta->execute();
    return $consulta->fetch();
}

function inserirLojaProduto(PDO $conexao, int $lojaId, int $produtoId, int $estoque){
    $sql = "INSERT INTO lojas_produtos(loja_id, produto_id, estoque)
            VALUES(:loja_id, :produto_id, :estoque)";

    $consulta = $conexao->prepare($sql);

    // Atribuindo os valores recebidos pela função para cada parâmetro nomeado
    $consulta->bindValue(':loja_id', $lojaId);
    $consulta->bindValue(':produto_id', $produtoId);
    $consulta->bindValue(':estoque', $estoque);

    $consulta->execute();
}

function atualizarLojaProduto(PDO $conexao, int $lojaId, int $produtoId, int $estoque){
    $sql = "UPDATE lojas_produtos SET estoque = :estoque WHERE loja_id = :loja_id AND produto_id = :produto_id";

    $consulta = $conexao->prepare($sql);

    // Atribuindo os valores recebidos pela função para cada parâmetro nomeado
    $consulta->bindValue(':loja_id', $lojaId);
    $consulta->bindValue(':produto_id', $produtoId);
    $consulta->bindValue(':estoque', $estoque);

    $consulta->execute();
}

function excluirProdutoLoja(PDO $conexao, int $idLoja, int $idProduto){
    $sql = "DELETE FROM lojas_produtos WHERE loja_id = :idLoja AND produto_id = :idProduto";
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":idLoja", $idLoja);
    $consulta->bindValue(":idProduto", $idProduto);
    $consulta->execute();
}

function buscarLojaProdutoPorIds(){}
