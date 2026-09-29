<?php
    require_once "../src/produtos_crud.php";
    $produtos = buscarProdutos($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'produtos';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Produtos</h2>
        <div class="barra-acoes"><a class="botao" href="inserir.php">+ Novo produto</a></div>
        <!-- Os registros serão carregados dinamicamente quando o back-end for implementado. -->
        <div class="area-tabela" tabindex="0">
            <table>
                <caption>Relação de Produtos</caption>
                <thead>
                    <?php foreach($produtos as $produto): ?>
                    <tr>
                        <th scope="col"><?= $produto['nome'] ?></th>
                        <th scope="col"><?= $produto['preco'] ?></th>
                        <th scope="col"><?= $produto['quantidade'] ?></th>
                        <th scope="col"><?= $produto['fornecedor'] ?></th>
                        <th scope="col">Ações</th>
                    </tr>
                    <?php endforeach ?>
                </thead>
                <tbody>
                    <!-- Aqui serão geradas as linhas com os dados e as ações Editar e Excluir de cada registro. -->
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>