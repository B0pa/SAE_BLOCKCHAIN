<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quiz $quiz
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= isset($quiz) ? $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $quiz->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $quiz->id), 'class' => 'side-nav-item']
            ) : '' ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="quiz form content">
            <?= $this->Form->create($quiz,  ['type' => 'file']) ?>
            <fieldset>
                <legend><?= isset($quiz) ? __('Edit Quiz') : __('Add Quiz') ?></legend>
                <?php
                    echo $this->Form->control('level', ['options' => [1 => 1, 2 => 2, 3 => 3]]);
                    echo $this->Form->control('question');

                    echo '<div id="textFields"></div>'; // Placeholder for dynamic fields

                    echo $this->Form->control('realanswer', ['options' => [1 => 1, 2 => 2, 3 => 3]]);
                    echo $this->Form->control('questionform', ['type' => 'select', 'options' => ['text' => 'Text', 'graphic' => 'Graphic', 'image' => 'Image']]);
                    echo $this->Form->control('category', ['type' => 'select', 'options' => ['blockchain' => 'Blockchain', 'danger' => 'Danger', 'nft' => 'NFT', 'crypto' => 'Crypto']]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var questionformSelect = document.getElementById('questionform');
    var textFields = document.getElementById('textFields');
    var answerFields = [];

    // Fonction pour créer un champ de réponse
    function createAnswerField(type, index) {
        var input = document.createElement('input');
        input.type = type;
        input.name = 'answer' + index;
        input.classList.add('form-control', 'bg-secondary', 'answer-field');
        textFields.appendChild(input);
        answerFields.push(input);
    }

    // Fonction pour supprimer tous les champs de réponse
    function clearAnswerFields() {
        answerFields.forEach(function (field) {
            field.remove();
        });
        answerFields = [];
    }

    // Fonction pour gérer les champs en fonction de la sélection
    function handleQuestionFormChange() {
        clearAnswerFields();

        // En fonction de la sélection, créez les champs appropriés
        var questionFormValue = questionformSelect.value;
        if (questionFormValue === 'image') {
            for (var i = 1; i <= 3; i++) {
                createAnswerField('file', i);
            }
        } else {
            for (var i = 1; i <= 3; i++) {
                createAnswerField('text', i);
            }
        }
    }

    // Initial setup based on the current value
    handleQuestionFormChange();

    // Écoutez les changements de sélection
    questionformSelect.addEventListener('change', handleQuestionFormChange);
});

</script>
