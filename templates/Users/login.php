<main id="login-profil" >
    <?= $this->Html->link(
        "Retourner à l'accueil",
        ['controller'=> 'Pages', 'action' => 'home'],
        [
            'id' => 'profil-btn-accueil',
            'class' => 'grow',
            'escapeTitle' => false
        ]
    ) ?>

    <div class="form">
        <?= $this->Flash->render() ?>
        <div class="box">
            <div class="form1">
                <?= $this->Form->create() ?>
                <h2>Connexion</h2>
                <div class="inputBox">
                    <?= $this->Form->control('email', [
                        'required' => true
                    ]) ?>
                    <i></i>
                </div>
                <div class="inputBox">
                    <?= $this->Form->control('password',
                        ['required' => true]) ?>
                    <i></i>
                </div>
                <?= $this->Form->submit(__('Login'), ['id' => 'login-btn-connexion','class'=>'grow']); ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</main>
