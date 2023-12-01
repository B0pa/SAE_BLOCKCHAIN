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
            <?= $this->Html->link(__('Edit Quiz'), ['action' => 'edit', $quiz->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Quiz'), ['action' => 'delete', $quiz->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quiz->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Quiz'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Quiz'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="quiz view content">
            <h3><?= h($quiz->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Question') ?></th>
                    <td><?= h($quiz->question) ?></td>
                </tr>
                <tr>
                    <th><?= __('Answer1') ?></th>
                    <td><?= h($quiz->answer1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Answer2') ?></th>
                    <td><?= h($quiz->answer2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Answer3') ?></th>
                    <td><?= h($quiz->answer3) ?></td>
                </tr>
                <tr>
                    <th><?= __('Questionform') ?></th>
                    <td><?= h($quiz->questionform) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= h($quiz->category) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($quiz->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Level') ?></th>
                    <td><?= $quiz->level === null ? '' : $this->Number->format($quiz->level) ?></td>
                </tr>
                <tr>
                    <th><?= __('Realanswer') ?></th>
                    <td><?= $quiz->realanswer === null ? '' : $this->Number->format($quiz->realanswer) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
