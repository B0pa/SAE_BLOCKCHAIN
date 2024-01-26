
<?= $this->element('nav')?>
<main class="mt-5 pt-5 justify-content-around d-md-flex col-sm- min-vh-100" >
    <div class="d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3 slideFromTop" >
        <h1>Questionnaire</h1>
        <?= $this->Form->create(null, ['url' => ['controller' => 'Pages', 'action' => 'rewardquiz']]) ?>
        <p class="justify-content-center ms-4 ms-md-0 text-md-center mt-md-2">Vous vous considerez plutot comme: </p>
        <?= $this->Form->radio('question_1', ['Ser' => 'Sérieux', 'Opt' => 'Optimiste', 'Far' => 'Farceur']) ?>
        <p class="justify-content-center ms-4 ms-md-0 text-md-center mt-md-2">Vous vous considerez plutot comme: </p>
        <?= $this->Form->radio('question_2', ['Ori' => 'Original', 'Sob' => 'Sobre', 'Lib' => 'Libre']) ?>
        <p class="justify-content-center ms-4 ms-md-0 text-md-center mt-md-2">Votre couleur préférée dans cette liste: </p>
        <?= $this->Form->radio('question_3', ['Rou' => 'Rouge', 'Ble' => 'Bleu', 'Ver' => 'Vert']) ?>

        <?= $this->Form->button('Soumettre') ?>
        <?= $this->Form->end() ?>

        <?php if ($imageName) : ?>
            <h1>Votre Image Personnalisée</h1>
            <?= $this->Html->image($imageName, ['alt' => 'Image personnalisée']) ?>
        <?php endif; ?>
    </div>
</main>
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

