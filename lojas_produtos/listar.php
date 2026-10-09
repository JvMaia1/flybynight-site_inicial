<?php
require_once "../src/loja_produto_crud.php";
$produtos = buscarLojasProdutos($conexao);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos por loja - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'lojas_produtos';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Produtos por loja</h2>
        <p>Gerencie os vínculos e o estoque de cada produto nas lojas. A exclusão remove somente o vínculo.</p>
        <div class="barra-acoes"><a class="botao" href="inserir.php">+ Novo vínculo</a></div>
        <!-- Os registros serão carregados dinamicamente quando o back-end for implementado. -->
        <div class="area-tabela" tabindex="0">
            <table>
                <caption>Relação de Produtos por loja</caption>
                <thead>
                    <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <th scope="col"><?= $produto['loja_nome'] ?></th>
                        <th scope="col"><?= $produto['produto_nome'] ?></th>
                        <th scope="col"><?= $produto['estoque'] ?></th>
                        <th scope="col"><a href="editar.php?loja_id=<?= $produto['loja_id'] ?>&produto_id=<?= $produto['produto_id'] ?>">Editar</a></th>
                        <th scope="col"><a class="excluir" href="excluir.php?id=<?= $produto['produto_id'] ?>">Excluir</a></th>
                    </tr>
                    <?php endforeach; ?>
                </thead>
                <tbody>
                    <!-- Aqui serão geradas as linhas com os dados e as ações Editar e Excluir de cada registro. -->
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>