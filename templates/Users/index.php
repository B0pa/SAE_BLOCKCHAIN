<?php

/**

 * @var \App\View\AppView $this

 * @var iterable<\App\Model\Entity\User> $users

 */

?>

<main id="usersdelete-main" class="navmarge" >
    <h3 id="usersdelete-title" ><?= __('Users') ?></h3>
    <div id="usersdelete-conteneur-table">
        <table>
            <thead id="usersdelete-table-thead" >
                <tr>
                    <th class="usersdelete-table-th-td" ><?= $this->Paginator->sort('id') ?></th>
                    <th class="usersdelete-table-th-td" ><?= $this->Paginator->sort('name') ?></th>
                    <th class="usersdelete-table-th-td" ><?= $this->Paginator->sort('email') ?></th>
                    <th class="actions usersdelete-table-th-td"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td class="usersdelete-table-th-td" ><?= $this->Number->format($user->id) ?></td>
                    <td class="usersdelete-table-th-td" ><?= h($user->name) ?></td>
                    <td class="usersdelete-table-th-td" ><?= h($user->email) ?></td>
                    <td class="actions usersdelete-table-th-td">
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div id="usersdelete-paginator" class="paginator">
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

