<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Quiz> $quiz
 */
?>
<body class="bg-secondary pt-5 mt-5 " >
<?= $this->element('nav_admin')?>
    <main class="p-5 mt-5" >
        <div class="quiz index content bg-dark p-4 rounded-3 text-white">
            <?= $this->Html->link(__('New Quiz'), ['action' => 'add'], ['class' => 'btn btn-warning']) ?>
            <h3><?= __('Quiz') ?></h3>
            <div class="table-responsive bg-secondary rounded p-3 text-dark">
                <table>
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('id') ?></th>
                            <th><?= $this->Paginator->sort('question') ?></th>
                            <th><?= $this->Paginator->sort('answer1') ?></th>
                            <th><?= $this->Paginator->sort('answer2') ?></th>
                            <th><?= $this->Paginator->sort('answer3') ?></th>
                            <th><?= $this->Paginator->sort('realanswer') ?></th>
                            <th><?= $this->Paginator->sort('questionform') ?></th>
                            <th><?= $this->Paginator->sort('category') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($quiz as $quiz): ?>
                        <tr>
                            <td><?= $this->Number->format($quiz->id) ?></td>
                            <td><?= h($quiz->question) ?></td>
                            <td><?= h($quiz->answer1) ?></td>
                            <td><?= h($quiz->answer2) ?></td>
                            <td><?= h($quiz->answer3) ?></td>
                            <td><?= $quiz->realanswer === null ? '' : $this->Number->format($quiz->realanswer) ?></td>
                            <td><?= h($quiz->questionform) ?></td>
                            <td><?= h($quiz->category) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $quiz->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quiz->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quiz->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quiz->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
            </div>
        </div>
    </main>
</body>

