<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actuality $actuality
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Actualities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="actualities form content">
        <?= $this->Form->create($actualities, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Add Actuality') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('text');
                    echo $this->Form->control('link');
                    echo $this->Form->control('img', [
                        'type' => 'file',
                        'label' => 'Votre jolie image',
                        'class' => 'form-control',
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
