<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Article> $articles
 */
?>
<main class="navmarge index-main" >
    <?= $this->Html->link(__('New Article'), ['action' => 'add'], ['class' => 'index-btn-new grow']) ?>
    <h3 class="index-title" ><?= __('Articles') ?></h3>
    <div class="index-conteneur-table">
        <table>
            <thead class="index-table-thead" >
            <tr>
                <th class="index-table-th-td" ><?= $this->Paginator->sort('id') ?></th>
                <th class="index-table-th-td" ><?= $this->Paginator->sort('title') ?></th>
                <th class="index-table-th-td" ><?= $this->Paginator->sort('level') ?></th>
                <th class="index-table-th-td" ><?= $this->Paginator->sort('category') ?></th>
                <th class="index-table-th-td" >Image</th>
                <th class="actions index-table-th-td"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($articles as $article): ?>
                <tr>
                    <td class="index-table-th-td" ><?= $this->Number->format($article->id) ?></td>
                    <td class="index-table-th-td" ><?= h($article->title) ?></td>
                    <td class="index-table-th-td" ><?= $article->level === null ? '' : $this->Number->format($article->level) ?></td>
                    <td class="index-table-th-td" ><?= h($article->category) ?></td>
                    <td class="index-table-th-td" ><?= $article->image ?></td>
                    <td class="actions index-table-th-td">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $article->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?>
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
