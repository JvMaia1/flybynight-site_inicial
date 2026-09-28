<?php 
// src/concta.php
// parametros de conexao ao servirod Mysql
$servidor = 'localhost';
$banco = 'flybynight_completo';
$usuario = 'maia';
$senha = 'maia123';

try {
    $conexao = new PDO(
            "mysql:host=$servidor;
            dbname=$banco;
            charset=utf8mb4",
            $usuario,
            $senha
        );

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch (PDOException $erro) {
    error_log($erro->getMessage());
    exit("Não foi possivel conectar ao banco de dados.");
}

var_dump($conexao);