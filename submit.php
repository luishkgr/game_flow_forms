<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Pesquisa de Satisfação GameFlow</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <div class='obrigado'>
        <img class='logo' src='assets/logo.png'>
        <?php
        $_POST['data'] = date('Y-m-d H:i:s');
        file_put_contents(
            'respostas.jsonl',
            json_encode($_POST, JSON_UNESCAPED_UNICODE) . PHP_EOL,
            FILE_APPEND
        );
        ?>
        <h2>Obrigado pela sua avaliação!</h2>
        <a href="index.php" class="btn-voltar">
            Fazer nova avaliação
        </a>
    </div>
</body>