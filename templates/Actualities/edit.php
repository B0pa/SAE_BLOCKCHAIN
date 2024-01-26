<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actuality $actuality
 */
?>
<?= $this->element('nav_admin')?>
<main class="mt-5 pt-3" >
    <div class="row col-12 p-3">
        <aside class="col">
            <div class="side-nav">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $actuality->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $actuality->id), 'class' => 'side-nav-item']
                ) ?>
                <?= $this->Html->link(__('List Actualities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="col-9 p-3 bg-dark rounded text-white">
            <div class="actualities content">
                <?= $this->Form->create($actuality) ?>
                <fieldset>
                    <legend><?= __('Edit Actuality') ?></legend>
                    <?php
                    echo $this->Form->control('title', [
                        'class' => 'form-control bg-secondary'
                    ]);
                    echo $this->Form->control('text', [
                        'class' => 'form-control bg-secondary'
                    ]);
                    echo $this->Form->control('link', [
                        'class' => 'form-control bg-secondary'
                    ]);
                    echo $this->Form->control('img', [
                        'type' => 'file',
                        'label' => 'Votre jolie image',
                        'class' => 'form-control bg-secondary',
                        'after' => $this->Form->button('Modifier l\'image', ['type' => 'button', 'class' => 'btn btn-secondary mt-3', 'id' => 'edit-upload-btn', 'data-target' => '#upload-input']),
                    ]);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-secondary mt-3']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</main>