<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Quiz sur la Blockchain</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<nav>
    <?= $this->element('nav3')?>
</nav>
<main>
    <div id="quiz-container">
        <div class="PTop">
            <h1>Quiz sur la Blockchain</h1>
            <p id="score"></p>
        </div>
        <div class="PTop">
            <p id="question">Question 1 : Qu'est-ce que la blockchain ?</p>
            <p id="difficulty">Easy</p>
        </div>
        <div id="options" class="grid-container">
            <input type="radio" name="choice" id="choice1" value="A">
            <label for="choice1"></label>
            <input type="radio" name="choice" id="choice2" value="B">
            <label for="choice2">=</label>
            <input type="radio" name="choice" id="choice3" value="C">
            <label for="choice3"></label>
        </div>
        <button id="submit-button" onclick="checkAnswer()">Soumettre</button>
    </div>
    <div id="result-container">
        <p id="result"></p>
    </div>
    <?= $this->Html->script('/js/quizBlock.js') ?>
</main>
</body>
</html>
