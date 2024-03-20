<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Actuality> $actualities
 */
?>
<main class="navmarge index-main" >
    <?= $this->Html->link(__('Ajouter une actualité'), ['action' => 'add'], ['class' => 'index-btn-new grow']) ?>
    <h3 class="index-title" ><?= __('Actualities') ?></h3>
    <div class="index-conteneur-table">
        <table>
            <thead class="index-table-thead" >
                <tr>
                    <th class="index-table-th-td" ><?= $this->Paginator->sort('id') ?></th>
                    <th class="index-table-th-td" ><?= $this->Paginator->sort('title') ?></th>
                    <th class="index-table-th-td" ><?= $this->Paginator->sort('link') ?></th>
                    <th class="index-table-th-td" ><?= $this->Paginator->sort('img') ?></th>
                    <th class="actions index-table-th-td"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($actualities as $actuality): ?>
                <tr>
                    <td class="index-table-th-td"><?= $this->Number->format($actuality->id) ?></td>
                    <td class="index-table-th-td"><?= h($actuality->title) ?></td>
                    <td class="index-table-th-td"><?= h($actuality->link) ?></td>
                    <td class="index-table-th-td"><?= h($actuality->img) ?></td>
                    <td class="actions index-table-th-td">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $actuality->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $actuality->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $actuality->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actuality->id)]) ?>
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
