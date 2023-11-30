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
            <?= $this->Form->create($quiz) ?>
            <fieldset>
                <legend><?= __('Add Quiz') ?></legend>
                <?php
                    echo $this->Form->control('question');
                    echo $this->Form->control('answer1');
                    echo $this->Form->control('answer2');
                    echo $this->Form->control('answer3');
                    echo $this->Form->control('questionform');
                    echo $this->Form->control('category');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
