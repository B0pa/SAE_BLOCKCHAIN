<?php
/** @var \App\Model\Entity\Quiz[] $quizes */
foreach ($quizes as $quiz) :
    echo $this->Form->create($quiz);
    ?>
   <body class="bg-secondary" >
        <header>
            <nav>
                <?= $this->element('nav3')?>
            </nav>
        </header>
        <main class="pt-5 mt-5" >
            <div class="d-flex flex-column bg-dark text-white pt-5 col-10 mx-auto my-4 p-3 rounded-3 slideFromTop">
                <p><?= $quiz->level ?></p>
                <h2 class="text-center bg-secondary rounded-pill" ><?= $quiz->question ?></h2>
                <?php
                if ($quiz->questionform == "text"): ?>
                    <label class="text-white" >
                            <?= $this->Form->control('reponse', [
                                'type' => 'radio', 
                                'options' => [1 => $quiz->answer1],
                                'label' => false]) ?>
                        </label>
                        <label class="text-white" >
                            <?= $this->Form->control('reponse', [
                                'type' => 'radio', 
                                'options' => [1 => $quiz->answer2],
                                'label' => false]) ?>
                        </label>
                        <label class="text-white" >
                            <?= $this->Form->control('reponse', [
                                'type' => 'radio', 
                                'options' => [1 => $quiz->answer3],
                                'label' => false]) ?>
                        </label>
                <?php endif;
                ?>
                <?php if ($quiz->questionform == "image") :?>
                    <label class="d-flex justify-content-around" >
                        <?= $this->Form->radio('reponse', ['value' => 1]) ?>
                        <?= $this->Html->image("upload/" . $quiz->answer1, ['class' => 'd-flex img-fluid w-50 mx-auto rounded-3 mt-2 mb-3','alt' => 'accueil','style' => '']) ?>
                  
                        <?= $this->Form->radio('reponse', ['value' => 2]) ?>
                        <?= $this->Html->image("upload/" . $quiz->answer2, ['class' => 'd-flex img-fluid w-50 mx-auto rounded-3 mt-2 mb-3','alt' => 'accueil','style' => '']) ?>
                    
                        <?= $this->Form->radio('reponse', ['value' => 3]) ?>
                        <?= $this->Html->image("upload/" . $quiz->answer3, ['class' => 'd-flex img-fluid w-50 mx-auto rounded-3 mt-2 mb-3','alt' => 'accueil','style' => '']) ?>
                    </label>
                <?php endif; ?>
                <?= $this->Form->submit(__('valider'), ['class' => 'btn btn-secondary']); ?>
                <?= $this->Form->end() ?>
                <?= $this->Flash->render() ?>
            </div>
            <?php
            endforeach;
            ?>
        </main>
    </body>