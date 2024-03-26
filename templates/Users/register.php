<main id="register-main" class="navmarge" >
    <h1 id="register-h1" >Ajouter un administrateur</h1>
    <div id="register-conteneur">
        <?= $this->Flash->render() ?>
        <?= $this->Form->create() ?>

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
        <?= $this->Form->submit(__('Ajouter'), ['class' => 'btn btn-secondary']); ?>
        <?= $this->Form->end() ?>

    </div>
</main>
