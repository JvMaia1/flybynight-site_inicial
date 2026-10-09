<?php
// produtos/editar.php

/* Exercícios */

// PARTE 1

// 1) Importar os arquivos de função de fornecedores e produtos
require_once "../src/fornecedor_crud.php";
require_once "../src/produto_crud.php";

// 2) Capturar e guardar o id do produto que será carregado/atualizado
$id = $_GET['id'];

// 3) Chamar a função buscarFornecedores e receber a lista de fornecedores (guarde em um variável chamada $fornecedores)
$fornecedores = buscarFornecedores($conexao);

// 4) Chamar a função buscarProdutoPorId e receber os dados do produto (guarde em uma variável chamada $produto)
$produto = buscarProdutoPorId($conexao, $id);


// PARTE 2

// 1) Detectar o acionamento do formulário de atualização

// 2) Capturar os dados do formulário

// 3) Chamar a função atualizarProduto e passar os dados pra ela

// 4) Redirecionar para a página listar produtos

// 5) Testar: tente atualizar dados de pelo menos 3 produtos

if($_SERVER['REQUEST_METHOD'] ===  'POST'){
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $descricao = $_POST['descricao'];
    $fornecedor = $_POST['fornecedor'];
    atualizarProduto($conexao, $id, $nome, $descricao, $preco, $quantidade, $fornecedor);
    header("location:listar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'produtos';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Editar produto</h2>
        
        <!-- PARTE 1 -->
        <!-- 5) Exibir os dados do produto em cada campo do formulário 
        No caso dos campos input, use o atributo value.
        No caso do campo textarea, coloque o valor dentro da tag. 
        -->
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $produto['id'] ?>">
            <div>
                <label for="nome">Nome:</label>
                <input value="<?= $produto['nome'] ?>"
                type="text" name="nome" id="nome" maxlength="100" required >
            </div>
            <div>
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" rows="5"><?= $produto['descricao'] ?></textarea>
            </div>
            <div>
                <label for="preco">Preço:</label>
                <input value="<?= $produto['preco'] ?>"
                type="number" name="preco" id="preco" min="0" step="0.01" required>
            </div>
            <div>
                <label for="quantidade">Quantidade:</label>
                <input value="<?= $produto['quantidade'] ?>"
                type="number" name="quantidade" id="quantidade" min="0" step="1" required>
            </div>
            <div>
                <label for="fornecedor">Fornecedor:</label>
                <select name="fornecedor" id="fornecedor" required>
                    <option value="">Selecione</option>
                    
                    <!-- PARTE 1 -->
                    <!-- 6) DESAFIO 
                    
                    6.1) Usando foreach, acesse os $fornecedores
                    e mostre na tag <option> os nomes de cada fornecedor.
                    No atributo value, coloque o id de cada fornecedor.

                    6.2) O fornecedor daquele produto que está sendo exibido,
                    já DEVE VIR SELECIONADO. Programe os recursos para isso
                    acontecer.  -->
                    <?php foreach($fornecedores as $fornecedor): ?>
                        <!-- Se PK de fornecedor for igual à FK de produto, selecione o fornecedor -->
                        <option
                        <?= $fornecedor["id"] === $produto["fornecedor_id"] ? 'selected' : '' ?>
                        value="<?= $fornecedor['id'] ?>"> 
                            <?= $fornecedor['nome'] ?> 
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <button type="submit">Atualizar</button>
        </form>
        <a href="listar.php">← Voltar</a>
    </main>
</body>

</html>