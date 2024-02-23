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
                    <i id="loginI" ></i>
                </div>
                <div class="inputBox">
                    <?= $this->Form->control('password',
                        ['required' => true]) ?>
                    <i id="passwordI" ></i>
                </div>
                <?= $this->Form->submit(__('Login'), ['id' => 'login-btn-connexion','class'=>'grow']); ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</main>
<script>
var logInput = document.getElementById('email');
var passInput = document.getElementById('password');
var logi =document.getElementById('loginI');
var passi =document.getElementById('passwordI');

logInput.addEventListener('focus',function(){
    logi.style.height = '44px';
    logInput.style.color = 'black'
})

logInput.addEventListener('blur',function(){
    logi.style.height = '';
    logInput.style.color = 'white' 
})

passInput.addEventListener('focus',function(){
    passi.style.height = '44px';
    passInput.style.color = 'black'
})

passInput.addEventListener('blur',function(){
    passi.style.height = '';
    passInput.style.color = 'white' 
})
</script>