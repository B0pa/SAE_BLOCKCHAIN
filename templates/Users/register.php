<div class="users form">
    <?= $this->Flash->render() ?>
    <h3>Register</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->control('email', [
            'required' => true,
            'class' => 'form-control',
        ]) ?>
        <?= $this->Form->control('name', [
            'required' => true,
            'class' => 'form-control',
        ]) ?>
        <?= $this->Form->control('password', ['required' => true,
            'class' => 'form-control'
        ]) ?>
    </fieldset>
    <?= $this->Form->submit(__('s\'inscrire')); ?>
    <?= $this->Form->end() ?>
git
    <?= $this->Html->link("Add User", ['action' => 'add']) ?>
</div>


