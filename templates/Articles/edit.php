<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>

<body class="bg-secondary pt-5 mt-5" >
    <?= $this->element('nav_admin')?>
    <main class="mt-5 pt-3" >
        <div class="row col-12 p-3">
            <aside class="col">
                <div class="side-nav">
                    <h4 class="heading"><?= __('Actions') ?></h4>
                    <?= $this->Form->postLink(
                        __('Delete'),
                        ['action' => 'delete', $article->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $article->id), 'class' => 'side-nav-item']
                    ) ?>
                    <?= $this->Html->link(__('List Articles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                </div>
            </aside>
            <div class="col-9 p-3 bg-dark rounded text-white">
                <div class="articles content">
                    <?= $this->Form->create($article) ?>
                    <fieldset>
                        <legend><?= __('Edit Article') ?></legend>
                        <?php
                            echo $this->Form->control('title',['class' => 'form-control bg-secondary']);
                            echo $this->Form->control('content',['class' => 'form-control bg-secondary']);
                            echo $this->Form->control('level',['class' => 'form-control bg-secondary']);
                            echo $this->Form->control('category',['class' => 'form-control bg-secondary']);
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-secondary mt-3']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </main>
</body>


