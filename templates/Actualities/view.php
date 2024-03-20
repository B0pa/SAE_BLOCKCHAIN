<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actuality $actuality
 */
?>
<main class="pt-3 p-3" >
    <div class="row">
        <aside class="col">
            <div class="side-nav">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Html->link(__('Edit Actuality'), ['action' => 'edit', $actuality->id], ['class' => 'side-nav-item']) ?>
                <?= $this->Form->postLink(__('Delete Actuality'), ['action' => 'delete', $actuality->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actuality->id), 'class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('List Actualities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('New Actuality'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="col col-9">
            <div class="actualities view content">
                <h3><?= h($actuality->title) ?></h3>
                <table>
                    <tr>
                        <th><?= __('Title') ?></th>
                        <td><?= h($actuality->title) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Link') ?></th>
                        <td><?= h($actuality->link) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Img') ?></th>
                        <td><?= h($actuality->img) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($actuality->id) ?></td>
                    </tr>
                </table>
                <div class="text">
                    <strong><?= __('Text') ?></strong>
                    <blockquote>
                        <?= $this->Text->autoParagraph(h($actuality->text)); ?>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</main>
