<!DOCTYPE html>
<html lang="fr" >
<head>
    <meta charset="UTF-8">
    <title>Quiz sur la NFT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    input:checked~label {
        box-shadow: 0px 0px 15px 10px rgba(10,255,0,0.8);
    }
</style>
<body class="bg-secondary">
<nav>
    <?= $this->element('nav3')?>
</nav>
<main class="pt-5 mt-5">
    <div id="quiz-container d-flex flex-column">
        <div class="pt-3">

            <p id="score">NFT : 0</p>
        </div>
        <div id="quizzes">
            <!-- Cet élément sera utilisé pour afficher les quiz (ajoutés automatiquement) -->
        </div>
        <button id="submit-button" class="btn btn-dark my-3 position-relative start-50 translate-middle-x "  onclick="checkAnswers()" >Soumettre</button>
    </div>
    <?= $this->Html->script('/js/quizNFT.js') ?>
</main>
<?= $this->element('footer')?>
</body>
</html>

