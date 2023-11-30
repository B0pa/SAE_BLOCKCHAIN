<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Quiz sur la NFT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav>
    <?= $this->element('nav')?>
</nav>
<main>
    <div id="quiz-container">
        <div class="PTop">

            <p id="score">BTC : 0</p>
        </div>
        <div id="quizzes" class="grid-container">
            <!-- Cet élément sera utilisé pour afficher les quiz (ajoutés automatiquement) -->
        </div>
        <button id="submit-button" onclick="checkAnswers()">Soumettre</button>
    </div>
    <?= $this->Html->script('/js/quizNFT.js') ?>
</main>
</body>
</html>