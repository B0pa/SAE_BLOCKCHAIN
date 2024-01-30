
<?= $this->element('nav2')?>
<main class="" >
    <div class="">
        <h2 class="" >Supprimer les cookies</h2>
        <p>Êtes-vous sûr de vouloir supprimer tous les cookies ?</p>
        <?= $this->Html->link('Supprimer tous les cookies', ['controller' => 'Pages', 'action' => 'deleteAllCookies'], ['class' => 'btn btn-danger']) ?>
    </div>

    <div class="">
        <h2 class="" >Choisir le niveau</h2>
        <?= $this->Form->create(null, ['url' => ['controller' => 'Pages', 'action' => 'manageCookies']]) ?>
        <?= $this->Form->control('level', ['type' => 'select', 'options' => ['Niv 1', 'Niv 2', 'Niv 3'], 'empty' => 'Choisir un niveau']) ?>
        <?= $this->Form->button('Définir le niveau', ['class' => 'btn btn-primary']) ?>
        <?= $this->Form->end() ?>
    </div>
</main>
<?= $this->element('footer')?>
