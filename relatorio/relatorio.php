<?php

$linhas = file('../respostas.jsonl', FILE_IGNORE_NEW_LINES);

$respostas = [];

foreach ($linhas as $linha) {
    $respostas[] = json_decode($linha, true);
}

$total = count($respostas);

$somaIndicacao = 0;
$somaOrganizacao = 0;
$somaAtendimento = 0;
$somaPreco = 0;

$dinamicas = [];
$melhorias = [];

foreach ($respostas as $r) {

    $somaIndicacao += (int)$r['indicacao'];
    $somaOrganizacao += (int)$r['organizacao'];
    $somaAtendimento += (int)$r['atendimento'];
    $somaPreco += (int)$r['preco_qualidade'];

    $dinamica = $r['dinamicas'];

    if (!isset($dinamicas[$dinamica])) {
        $dinamicas[$dinamica] = 0;
    }

    $dinamicas[$dinamica]++;

    if (!empty($r['melhoria'])) {
        $melhorias[] = $r['melhoria'];
    }
}

$mediaIndicacao = round($somaIndicacao / $total, 1);
$mediaOrganizacao = round($somaOrganizacao / $total, 1);
$mediaAtendimento = round($somaAtendimento / $total, 1);
$mediaPreco = round($somaPreco / $total, 1);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

    <title>Relatório GameFlow</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <h1>Relatório de Satisfação GameFlow</h1>

    <div class="card">

        <h2>Resumo</h2>

        <p>Total de respostas: <?= $total ?></p>

        <p>Indicação: <?= $mediaIndicacao ?>/5 ⭐</p>

        <p>Organização: <?= $mediaOrganizacao ?>/5 ⭐</p>

        <p>Atendimento: <?= $mediaAtendimento ?>/5 ⭐</p>

        <p>Preço x Qualidade: <?= $mediaPreco ?>/5 ⭐</p>

    </div>

    <div class="card">

        <h2>Dinâmicas</h2>

        <table>

            <tr>
                <th>Opção</th>
                <th>Quantidade</th>
            </tr>

            <?php foreach ($dinamicas as $nome => $quantidade): ?>

                <tr>
                    <td><?= $nome ?></td>
                    <td><?= $quantidade ?></td>
                </tr>

            <?php endforeach; ?>

        </table>

    </div>

    <div class="card">

        <h2>Sugestões</h2>

        <ul>

            <?php foreach ($melhorias as $item): ?>

                <li><?= htmlspecialchars($item) ?></li>

            <?php endforeach; ?>

        </ul>

    </div>

</body>

</html>