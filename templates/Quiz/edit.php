<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quiz $quiz
 */
?>
<body class="bg-secondary pt-5 mt-5" >
<?= $this->element('nav_admin')?>
<main class="mt-5 pt-3" >
<div class="row col-12 p-3">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $quiz->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $quiz->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Quiz'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="col-9 p-3 bg-dark rounded text-white">
        <div class="quiz content">
            <?= $this->Form->create($quiz) ?>
            <fieldset>
                <legend><?= __('Edit Quiz') ?></legend>
                <?php
                    echo $this->Form->control('level',['class' => 'form-control bg-secondary']);
                    echo $this->Form->control('question',['class' => 'form-control bg-secondary']);
                    echo $this->Form->control('answer1',['class' => 'form-control bg-secondary']);
                    echo $this->Form->control('answer2',['class' => 'form-control bg-secondary']);
                    echo $this->Form->control('answer3',['class' => 'form-control bg-secondary']);
                    echo $this->Form->control('realanswer',['class' => 'form-control bg-secondary']);
                    echo $this->Form->control('questionform',['class' => 'form-control bg-secondary']);
                    echo $this->Form->control('category',['class' => 'form-control bg-secondary']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'),['class' => 'btn btn-secondary mt-3']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
</main>
</body>
