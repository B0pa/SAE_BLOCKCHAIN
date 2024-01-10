<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actuality $actuality
 */
?>
<body class="bg-secondary pt-5" >
<?= $this->element('nav_admin')?>
<main class="mt-5 pt-3 " >
    <div class="row col-12 p-3">
        <aside class="col">
            <div class="side-nav">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Html->link(__('List Actualities'), ['action' => 'index'], ['class' => 'side-nav-item text-warning']) ?>
            </div>
        </aside>
        <div class="col-9 p-3 bg-dark rounded text-white">
            <div class="actualities content">
                <?= /** @var \App\Model\Entity\Actuality $actualities */
                $this->Form->create($actualities, ['type' => 'file']) ?>
                <fieldset>
                    <legend><?= __('Add Actuality') ?></legend>
                    <?php
                    echo $this->Form->control('title', [
                        'class' => 'form-control bg-secondary'
                    ]);
                    echo $this->Form->control('content', [
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
</body>
