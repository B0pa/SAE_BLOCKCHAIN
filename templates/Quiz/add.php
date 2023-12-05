<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quiz $quiz
 */
?>
<body class="bg-secondary pt-5" >
<?= $this->element('nav_admin')?>
    <main class="mt-5"></main>
        <div class="row col-12 p-3">
            <aside class="col">
                <div class="side-nav">
                    <h4 class="heading"><?= __('Actions') ?></h4>
                    <?= $this->Html->link(__('List Quiz'), ['action' => 'index'], ['class' => 'side-nav-item text-warning']) ?>
                </div>
            </aside>
            <div class="col-9 p-3 bg-dark rounded text-white">
                <div class="quiz content">
                    <?= $this->Form->create($quiz, ['type' => 'file']) ?>
                    <fieldset>
                        <legend><?= __('Add Quiz') ?></legend>
                        <?php
                            echo $this->Form->control('level', ['options' => [1 => 1, 2 => 2, 3 => 3]]);
                            echo $this->Form->control('question',['class' => 'form-control bg-secondary']);
                            echo $this->Form->control('realanswer', ['type' => 'select', 'options' => [1 => 1, 2 => 2, 3 => 3]]);
                            echo $this->Form->control('questionform', ['type' => 'select', 'options' => ['text' => 'Text', 'graphic' => 'Graphic', 'image' => 'Image']]);
                        ?>

                        <div id="textFields">
                            <?php
                                echo $this->Form->control('answer1',['class' => 'form-control bg-secondary']);
                                echo $this->Form->control('answer2' ,['class' => 'form-control bg-secondary']);
                                echo $this->Form->control('answer3' ,['class' => 'form-control bg-secondary']);
                            ?>
                        </div>

                        <div id="imageFields" style="display: none;">
                            <?php
                                echo $this->Form->control('answer1', ['type' => 'file', 'label' => 'Upload Image 1', 'class' => 'form-control',]);
                                echo $this->Form->control('answer2', ['type' => 'file', 'label' => 'Upload Image 2', 'class' => 'form-control',]);
                                echo $this->Form->control('answer3', ['type' => 'file', 'label' => 'Upload Image 3', 'class' => 'form-control',]);
                            ?>
                        </div>

                        <?php
                            echo $this->Form->control('category', ['type' => 'select', 'options' => ['blockchain' => 'Blockchain', 'danger' => 'Danger', 'nft' => 'NFT', 'crypto' => 'Crypto']]);
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-secondary mt-3']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </main>
</body>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var questionformSelect = document.getElementById('questionform');
    var textFields = document.getElementById('textFields');
    var imageFields = document.getElementById('imageFields');

    questionformSelect.addEventListener('change', function () {
        if (this.value === 'image') {
            textFields.style.display = 'none';
            imageFields.style.display = 'block';
        } else {
            textFields.style.display = 'block';
            imageFields.style.display = 'none';
        }
    });
});
</script>
