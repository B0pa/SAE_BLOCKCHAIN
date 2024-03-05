<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Answer $answer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Answer'), ['action' => 'edit', $answer->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Answer'), ['action' => 'delete', $answer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $answer->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Answers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Answer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="answers view content">
            <h3><?= h($answer->answer) ?></h3>
            <table>
                <tr>
                    <th><?= __('Answer') ?></th>
                    <td><?= h($answer->answer) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($answer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Num') ?></th>
                    <td><?= $this->Number->format($answer->num) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
