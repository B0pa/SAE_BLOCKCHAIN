<body class="bg-secondary pt-5" >
<?= $this->element('nav_admin')?>
<main class="pt-5 mt-5">
    <div class="users d-flex form mt-5 pt-5 col-12 col-md-5 mx-auto">
        <?= $this->Flash->render() ?>
        <div class="my-5 text-center" ></div>
        <?= $this->Form->create() ?>
        <fieldset class="bg-dark p-5 text-white rounded-3" >
            <legend class="text-center" ><?= __('Please enter your username and password') ?></legend>
            <?= $this->Form->control('email', [
                'required' => true,
                'class' => 'form-control bg-secondary',
            ]) ?>
            <?= $this->Form->control('name', [
                'required' => true,
                'class' => 'form-control bg-secondary',
            ]) ?>
            <?= $this->Form->control('password', ['required' => true,
                'class' => 'form-control bg-secondary mb-3',
            ]) ?>
            <?= $this->Form->submit(__('s\'inscrire'), ['class' => 'btn btn-secondary']); ?>
            <?= $this->Form->end() ?>
        </fieldset>

    </div>
</main>
</body>


