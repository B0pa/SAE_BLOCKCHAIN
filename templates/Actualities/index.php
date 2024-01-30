<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Actuality> $actualities
 */
?>
<body class="bg-secondary pt-5 mt-5 " >
<?= $this->element('nav_admin')?>

<main class="p-5 mt-5" >
    <div class="actualities index content bg-dark p-4 rounded-3 text-white">
        <?= $this->Html->link(__('New Actuality'), ['action' => 'add'], ['class' => 'btn btn-warning']) ?>
        <h3><?= __('Actualities') ?></h3>
        <div class="table-responsive bg-secondary rounded p-3 text-dark">
            <table>
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('link') ?></th>
                    <th><?= $this->Paginator->sort('img') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($actualities as $actuality): ?>
                    <tr>
                        <td><?= $this->Number->format($actuality->id) ?></td>
                        <td><?= h($actuality->title) ?></td>
                        <td><?= h($actuality->link) ?></td>
                        <td><?= h($actuality->img) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $actuality->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $actuality->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $actuality->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actuality->id)]) ?>
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
