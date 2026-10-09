<?php
require_once "../src/loja_produto_crud.php";
require_once "../src/lojas_crud.php";
require_once "../src/produto_crud.php";

$lojas = buscarLojas($conexao);
$produtos = buscarProdutos($conexao);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $lojaId = $_POST['loja_id'];
    $produtoId = $_POST['produto_id'];
    $estoque = $_POST['estoque'];

    inserirLojaProduto($conexao, $lojaId, $produtoId, $estoque);
    header("Location:listar.php");
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar produto a uma loja - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'lojas_produtos';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Adicionar produto a uma loja</h2>
        <!-- Modelo visual: os campos não são enviados nem persistidos. -->
        <form action="" method="post">
            
            <div>
                <label for="loja">Loja:</label>
                <select name="loja_id" id="loja" required>
                    <?php foreach ($lojas as $loja): ?>
                    <option value="<?= $loja['id'] ?>"><?= $loja['nome'] ?></option>
                    <?php endforeach; ?>
                    <!-- As opções serão preenchidas com os registros do banco de dados. -->
                </select>
            </div>
            <div>
                <label for="produto">Produto:</label>
                <select name="produto_id" id="produto" required>
                    <?php foreach ($produtos as $produto): ?>
                    <option value="<?= $produto['id'] ?>"><?= $produto['nome_produto'] ?></option>
                    <?php endforeach; ?>
                    <!-- As opções serão preenchidas com os registros do banco de dados. -->
                </select>
            </div>
            <div>
                <label for="estoque">Estoque:</label>
                <input value="<?= $produto['estoque'] ?>" type="number" name="estoque" id="estoque" min="0" step="1" required>
            </div>
            <button type="submit">Salvar</button>
        </form>
        <a href="listar.php">← Voltar</a>
    </main>
</body>

</html>