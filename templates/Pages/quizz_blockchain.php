<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Quiz sur la NFT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css" />
</head>

<body>
<nav>
    <?= $this->element('nav3')?>
</nav>
<main>
    <div id="quiz-container">
        <div class="PTop">

            <p id="score">Chain : 0</p>
        </div>
        <div id="quizzes" class="grid-container">
            <!-- Cet élément sera utilisé pour afficher les quiz (ajoutés automatiquement) -->
        </div>
        <button id="submit-button" onclick="checkAnswers()">Soumettre</button>
    </div>
    <?= $this->Html->script('/js/quizBlock.js') ?>
</main>
<?= $this->element('footer')?>
</body>
</html>
