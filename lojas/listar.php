<?php
    require_once "../src/lojas_crud.php";
    $lojas = buscarLojas($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lojas - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'lojas';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Lojas</h2>
        <p>Ao excluir uma loja, seus vínculos e estoques por produto também serão removidos. Os produtos continuarão cadastrados.</p>
        <div class="barra-acoes"><a class="botao" href="inserir.php">+ Nova loja</a></div>
        <!-- Os registros serão carregados dinamicamente quando o back-end for implementado. -->
        <div class="area-tabela" tabindex="0">
            <table>
                <caption>Relação de Lojas</caption>
                <thead>
                    <?php foreach($lojas as $loja):  ?>
                    <tr>
                        <th scope="col"><?= $loja['id'] ?></th>
                        <th scope="col"><?= $loja['nome'] ?></th>
                        <th scope="col"><a href="editar.php?id=<?= $loja['id'] ?>">Editar</a></th>
                        <th scope="col"><a class="excluir" href="excluir.php?id=<?= $loja['id'] ?>">Excluir</a></th>
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