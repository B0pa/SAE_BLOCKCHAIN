<main class="pt-5 mt-5 bg-secondary d-flex flex-column align-items-center my-auto" style="height:100vh;">
<div class="bg-danger my-5 pt-5 " ></div>
    <div class="users form mt-5 bg-secondary rounded-3 col-10 mx-auto text-white p-3">
        <?= $this->Flash->render() ?>
        <div class="box text-white bg-dark m-auto">
                <div class="form d-flex bg-dark">
                    <?= $this->Form->create() ?>
                    <h2>Connexion</h2>
                        <div class="inputBox">
                        <?= $this->Form->control('email', [
                                                    'required' => true,
                                                    'class' => 'bg-transparent text-white',
                                                    'style' => 'outline:none;'
                                                                        ]) ?>
                        <i></i>
                    </div>
                    <div class="inputBox">
                        <?= $this->Form->control('password',
                                                     ['required' => true,
                                                     'class'=>'text-white']) ?>
                        <i></i>
                    </div>
                    <?= $this->Form->submit(__('Login'), ['class' => 'mt-2 m-auto col-12 text-center align-self-center']); ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
    </div>
</main>

