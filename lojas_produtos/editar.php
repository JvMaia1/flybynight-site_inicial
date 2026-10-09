<?php
    require_once "../src/loja_produto_crud.php";
    require_once "../src/lojas_crud.php";
    require_once "../src/produto_crud.php";
    $lojaId = intval($_GET['loja_id']);
    $produtoId = intval($_GET['produto_id']);
    $produtos = buscarProdutos($conexao);
    $lojas = buscarLojas($conexao);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $lojaId = $_POST['loja_id'];
        $produtoId = $_POST['produto_id'];
        $estoque = $_POST['estoque'];

        atualizarLojaProduto($conexao, $lojaId, $produtoId, $estoque);
        header("Location:listar.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto em uma loja - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'lojas_produtos';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Editar produto em uma loja</h2>
        <!-- Modelo visual: os campos não são enviados nem persistidos. -->
        <!-- Os campos serão preenchidos com os dados do registro selecionado. -->
        <form action="" method="post">

            <div>
                <label for="loja">Loja:</label>
                <select name="loja_id" id="loja" required>
                    <?php foreach ($lojas as $loja): ?>
                    <option <?= $loja['id'] == $lojaId ? 'selected' : '' ?> value="<?= $loja['id'] ?>"><?= $loja['nome'] ?></option>
                    <?php endforeach; ?>
                    <!-- As opções serão preenchidas com os registros do banco de dados. -->
                </select>
            </div>

            <div>
                <label for="produto">Produto:</label>
                <select name="produto_id" id="produto" required>
                    <?php foreach ($produtos as $produto): ?>
                    <option <?= $produto['id'] == $produtoId ? 'selected' : '' ?> value="<?= $produto['id'] ?>"><?= $produto['nome_produto'] ?></option>
                    <?php endforeach; ?>
                    <!-- As opções serão preenchidas com os registros do banco de dados. -->
                </select>
            </div>
            <div>
                <label for="estoque">Estoque:</label>
                <input type="number" name="estoque" id="estoque" min="0" step="1" required>
            </div>
            <button type="submit">Atualizar</button>
        </form>
        <a href="listar.php">← Voltar</a>
    </main>
</body>

</html>