<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Article> $articles
 */
?>
<body class="bg-secondary pt-5 mt-5 " >
    <?= $this->element('nav_admin')?>
    <main class="p-5 mt-5" >
        <div class="articles index content bg-dark p-4 rounded-3 text-white">
        <?= $this->Html->link(__('New Article'), ['action' => 'add'], ['class' => 'btn btn-warning']) ?>
        <h3><?= __('Articles') ?></h3>
            <div class="table-responsive bg-secondary rounded p-3 text-dark">
                <table>
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('id') ?></th>
                            <th><?= $this->Paginator->sort('title') ?></th>
                            <th><?= $this->Paginator->sort('level') ?></th>
                            <th><?= $this->Paginator->sort('category') ?></th>
                            <th>Image</th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($articles as $article): ?>
                        <tr>
                            <td><?= $this->Number->format($article->id) ?></td>
                            <td><?= h($article->title) ?></td>
                            <td><?= $article->level === null ? '' : $this->Number->format($article->level) ?></td>
                            <td><?= h($article->category) ?></td>
                            <td><?= $article->image ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $article->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?>
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


