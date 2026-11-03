<?php
require_once 'components/Question.php';

$questions = [

    [
        'name' => 'nome',
        'label' => '1. Qual seu nome?',
        'type' => 'text'
    ],

    [
        'name' => 'email',
        'label' => '2. Digite aqui seu melhor e-mail!',
        'type' => 'email'
    ],

    [
        'name' => 'indicacao',
        'label' => '3. O quanto você indicaria nosso produto para família ou amigo?',
        'type' => 'stars'
    ],

    [
        'name' => 'organizacao',
        'label' => '4. Como avalia a organização?',
        'type' => 'stars'
    ],

    [
        'name' => 'atendimento',
        'label' => '5. Como você avalia o atendimento?',
        'type' => 'stars'
    ],

    [
        'name' => 'dinamicas',
        'label' => '6. Como você avalia as dinâmicas dos jogos?',
        'type' => 'radio',
        'options' => [
            'Justa',
            'Divertida',
            'Sem graça',
            'Outro'
        ]
    ],

    [
        'name' => 'melhoria',
        'label' => '7. O que você melhoraria em nosso produto?',
        'type' => 'textarea'
    ],

    [
        'name' => 'preco_qualidade',
        'label' => '8. O quão justo você avalia o preço e qualidade?',
        'type' => 'stars'
    ]

];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Pesquisa de Satisfação GameFlow</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <div class="container">

        <div class="header">

            <img src="assets/logo.png">

            <h1>Pesquisa de Satisfação</h1>

            <p>
                Sua opinião ajuda a tornar a experiência GameFlow ainda melhor.
            </p>

        </div>
        <form action='submit.php' method='post'>
            <?php
            foreach ($questions as $question) {
                Question::render($question);
            }
            ?>

            <button type="submit">
                Enviar Avaliação
            </button>

        </form>

    </div>

</body>

</html>