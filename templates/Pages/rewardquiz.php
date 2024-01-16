<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Wallet</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body class="bg-secondary" >
    <header>
    <?= $this->element('nav2')?>
    </header>
    <main class="mt-5 pt-5 justify-content-around d-md-flex col-sm- min-vh-100" >
    <div class="mt-3 d-flex align-items-center d-md-block" >
<h1>Questionnaire</h1>
<?= $this->Form->create(null, ['url' => ['controller' => 'Pages', 'action' => 'rewardquiz']]) ?>
<p>Vous vous considerez plutot comme: </p>
<?= $this->Form->radio('question_1', ['Ser' => 'Sérieux', 'Opt' => 'Optimiste', 'Far' => 'Farceur']) ?>
<p>Vous vous considerez plutot comme: </p>
<?= $this->Form->radio('question_2', ['Ori' => 'Original', 'Sob' => 'Sobre', 'Lib' => 'Libre']) ?>
<p>Votre couleur préférée dans cette liste: </p>
<?= $this->Form->radio('question_3', ['Rou' => 'Rouge', 'Ble' => 'Bleu', 'Ver' => 'Vert']) ?>

<?= $this->Form->button('Soumettre') ?>
<?= $this->Form->end() ?>

<?php if ($imageName) : ?>
    <h1>Votre Image Personnalisée</h1>
    <?= $this->Html->image($imageName, ['alt' => 'Image personnalisée']) ?>
<?php endif; ?>
</div>
</main>
<?= $this->element('footer')?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.querySelector('form');

        form.addEventListener('submit', function (event) {
            var questions = ['question_1', 'question_2', 'question_3'];
            var hasSelectedAnswer = false;

            questions.forEach(function (question) {
                var radioButtons = document.getElementsByName(question);
                var isChecked = Array.from(radioButtons).some(function (radio) {
                    return radio.checked;
                });

                if (!isChecked) {
                    alert('Veuillez sélectionner une réponse pour la question ' + question.substr(-1));
                    event.preventDefault();
                    return;
                }

                hasSelectedAnswer = true;
            });

            if (!hasSelectedAnswer) {
                alert('Veuillez sélectionner au moins une réponse pour l\'une des questions.');
                event.preventDefault();
            }
        });
    });
</script>

</body>
</html>