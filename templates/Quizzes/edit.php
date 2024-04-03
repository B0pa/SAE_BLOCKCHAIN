<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quiz $quiz
 */
?>

<?php
// Lisez le contenu du répertoire 'csv'
$dir = WWW_ROOT . 'csv';
$files = array_diff(scandir($dir), array('..', '.'));
?>



<main class="navmarge add-main" >
    <div class="add-conteneur">
        <div class="slideFromTop add-add-conteneur">
            <div class="add-add-action-conteneur" >
                <h2 class="heading"><?= __('Actions') ?></h2>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $quiz->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $quiz->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Quiz'), ['action' => 'index'], ['class' => 'side-nav-item text-warning']) ?>
        </div>
            <?= $this->Form->create($quiz, ['type' => 'file']) ?>
            <fieldset class="add-add-content-conteneur" >
                <legend><?= __('Edit Quiz') ?></legend>
                <div class="add-add-content-title">
                    <?php
                    echo $this->Form->control('level', ['options' => [1 => 1, 2 => 2, 3 => 3],
                        'class' => 'form-control bg-secondary'
                    ]);
                    echo $this->Form->control('question',['class' => 'form-control bg-secondary']);
                    //  Affichez les messages flash
                    $this->Flash->render()
                    ?>
                </div>
                <div class="add-add-content-content">
                    <?php
                    // bouton pour ajouter une réponse
                    echo $this->Form->button(__('Add answer'), ['id' => 'add-answer', 'class' => 'btn btn-secondary']);
                    // bouton pour supprimer une reponse
                    echo $this->Form->button(__('Remove answer'), ['id' => 'remove-answer', 'class' => 'btn btn-secondary']);

                    echo $this->Form->control('realanswer', ['type' => 'select',
                        'class' => 'form-control bg-secondary',
                        'id' => 'realanswer'
                    ]);
                    echo $this->Form->control('questionform', ['type' => 'select', 'options' => ['text' => 'Text', 'graphic' => 'Graphic', 'image' => 'Image'],
                        'class' => 'form-control bg-secondary'
                    ]);
                    ?>

                    <div id="textFields"></div>


                    <?php
                    echo $this->Form->control('category', ['type' => 'select', 'options' => ['blockchain' => 'Blockchain', 'danger' => 'Danger', 'nft' => 'NFT', 'crypto' => 'Crypto'],
                        'class' => 'form-control bg-secondary'
                    ]);
                    ?>
                </div>



            </fieldset>
            <?= $this->Form->button(__('Submit'),['class' => 'btn btn-secondary mt-3']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <aside  class="slideFromTop add-prev-conteneur">
        <h2 id="preview-question" style="text-align: center;padding:5px;"></h2>
        <canvas id="myChart"></canvas>
        <div  class="d-flex justify-content-around my-5">

            <label class="text-white" id = "label-answer1">
                <input type="radio" id="preview-answer1" name="preview-answer" value="1">
                <div id="imagePreview1" style="padding:20px;"></div>
            </label>

            <label class="text-white" id = "label-answer2" >
                <input type="radio" id="preview-answer2" name="preview-answer" value="2">
                <div id="imagePreview2" style="padding:20px;"></div>
            </label>

            <label class="text-white" id = "label-answer3">
                <input type="radio" id="preview-answer3" name="preview-answer" value="3">
                <div id="imagePreview3" style="padding:20px;"></div>
            </label>
    </aside>
    </div>
</main >
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    document.addEventListener('DOMContentLoaded', function () {
    // Récupérez les informations du quiz à partir de l'objet PHP $quiz
    var quizInfo = {
        level: <?= $quiz->level ?>,
        question: '<?= $quiz->question ?>',
        realanswer: <?= $quiz->realanswer ?>,
        questionform: '<?= $quiz->questionform ?>',
        category: '<?= $quiz->category ?>'
    };

    // Assignez chaque information du quiz au champ d'entrée correspondant
    document.getElementById('level').value = quizInfo.level;
    document.getElementById('question').value = quizInfo.question;
    document.getElementById('realanswer').value = quizInfo.realanswer;
    document.getElementById('questionform').value = quizInfo.questionform;
    document.getElementById('category').value = quizInfo.category;

    // Récupérez les réponses du quiz à partir de l'objet PHP $quiz
    var quizAnswers = <?= json_encode($quiz->answers) ?>;

    // Parcourez chaque réponse du quiz
    for (var i = 0; i < quizAnswers.length; i++) {
        // Obtenez le champ de texte correspondant
        var textField = document.getElementById('answer' + (i + 1));

        // Assurez-vous que le champ de texte existe
        if (textField) {
            // Assignez la réponse du quiz au champ de texte
            textField.value = quizAnswers[i];
        }
    }
});
</script>
