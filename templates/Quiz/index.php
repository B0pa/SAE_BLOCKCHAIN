<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Quiz> $quiz
 */
?>
<main class="navmarge index-main">
    <?= $this->Html->link(__('New Quiz'), ['action' => 'add'],  ['class' => 'index-btn-new grow']) ?>
    <h3 class="index-title" ><?= __('Quiz') ?></h3>
    <div class="index-conteneur-table">
        <table>
            <thead class="index-table-thead" >
            <tr>
                <th class="index-table-th-td" ><?= $this->Paginator->sort('id') ?></th>
                <th class="index-table-th-td" ><?= $this->Paginator->sort('level') ?></th>
                <th class="index-table-th-td" ><?= $this->Paginator->sort('question') ?></th>
                <th class="index-table-th-td" ><?= $this->Paginator->sort('answer1') ?></th>
                <th class="index-table-th-td" ><?= $this->Paginator->sort('answer2') ?></th>
                <th class="index-table-th-td" ><?= $this->Paginator->sort('answer3') ?></th>
                <th class="index-table-th-td" ><?= $this->Paginator->sort('realanswer') ?></th>
                <th class="index-table-th-td" ><?= $this->Paginator->sort('questionform') ?></th>
                <th class="index-table-th-td" ><?= $this->Paginator->sort('category') ?></th>
                <th class="actions index-table-th-td"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($quiz as $quiz): ?>
                <tr>
                    <td class="index-table-th-td" ><?= $this->Number->format($quiz->id) ?></td>
                    <td class="index-table-th-td" ><?= $quiz->level === null ? '' : $this->Number->format($quiz->level) ?></td>
                    <td class="index-table-th-td" ><?= h($quiz->question) ?></td>
                    <td class="index-table-th-td" ><?= h($quiz->answer1) ?></td>
                    <td class="index-table-th-td" ><?= h($quiz->answer2) ?></td>
                    <td class="index-table-th-td" ><?= h($quiz->answer3) ?></td>
                    <td class="index-table-th-td" ><?= $quiz->realanswer === null ? '' : $this->Number->format($quiz->realanswer) ?></td>
                    <td class="index-table-th-td" ><?= h($quiz->questionform) ?></td>
                    <td class="index-table-th-td" ><?= h($quiz->category) ?></td>
                    <td class="actions index-table-th-td">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $quiz->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quiz->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quiz->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quiz->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator index-paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</main>
