<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quizz Danger</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-secondary">
<?= $this->element('nav3')?>
<main>
    <div id="quiz-container">
        <div class="PTop">

            <p id="score">Danger : 0</p>
        </div>
        <div id="quizzes" class="grid-container">
            <!-- Cet élément sera utilisé pour afficher les quiz (ajoutés automatiquement) -->
        </div>
        <button id="submit-button" onclick="checkAnswers()">Soumettre</button>
    </div>
    <?= $this->Html->script('/js/quizDanger.js') ?>
</main>
</body>
</html>

</body>
