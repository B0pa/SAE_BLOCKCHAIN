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
            <?= $this->Html->link(__('List Quiz'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="quiz form content">
            <?= $this->Form->create($quiz, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Add Quiz') ?></legend>
                <?php
                    echo $this->Form->control('level', ['options' => [1 => 1, 2 => 2, 3 => 3]]);
                    echo $this->Form->control('question');
                    echo $this->Form->control('realanswer', ['type' => 'select', 'options' => [1 => 1, 2 => 2, 3 => 3]]);
                    echo $this->Form->control('questionform', ['type' => 'select', 'options' => ['text' => 'Text', 'graphic' => 'Graphic', 'image' => 'Image']]);
                ?>

                <div id="textFields">
                    <?php
                        echo $this->Form->control('answer1');
                        echo $this->Form->control('answer2');
                        echo $this->Form->control('answer3');
                    ?>
                </div>

                <?php
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
    var imageFields = document.getElementById('imageFields');

    questionformSelect.addEventListener('change', function () {
        // Cache all answer fields
        var answerFields = document.querySelectorAll('.answer-field');

        if (this.value === 'image') {
            // Change answer type to file
            answerFields.forEach(function (field) {
                field.type = 'file';
            });
        } else {
            // Change answer type to text for other options
            answerFields.forEach(function (field) {
                field.type = 'text';
            });
        }
    });
});
</script>
