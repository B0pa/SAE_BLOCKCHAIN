<?php

/** @var \App\Model\Entity\Quiz[] $quizes */

foreach ($quizes as $quiz) :
    ?>
    <p><?= $quiz->level ?></p>
    <h2><?= $quiz->question ?></h2>


    <?php if ($quiz->questionform == "text"): ?>

    <?= $this->Form->control('les réponse', [
        'type' => 'radio',
        'value'=>[
            1=> $this->Html->image("upload/" . $quiz->answer1),
            2=> $this->Html->image("upload/" . $quiz->answer2),
            3=> $this->Html->image("upload/" . $quiz->answer3)
        ],
        'options' => [
            1 => $quiz->answer1,
            2 => $quiz->answer2,
            3 => $quiz->answer3
        ]
    ]); ?>

<?php endif; ?>

    <?php if ($quiz->questionform == "image") :?>

    <div>
        <?= $this->Form->control('reponse', [
            'type' => 'radio',
            'options' => [
                1 => $this->Html->image("upload/" . $quiz->answer1),
                2 => $this->Html->image("upload/" . $quiz->answer2),
                3 => $this->Html->image("upload/" . $quiz->answer3)
            ]
        ]); ?>
        <?= $this->Form->submit(__('valider'), ['class' => 'btn btn-secondary']); ?>
        <?= $this->Form->end() ?>
    </div>

    <?php endif; ?>

    <?= $this->Form->submit() ?>

    <?= $this->Form->end() ?>

    <?= $this->Flash->render() ?>

<?php
endforeach;
?>


<body class="bg-secondary">
<nav>

</nav>
<main class="pt-5 mt-5" style="height:150vh">
    <div id="quiz-container d-flex flex-column">
        <div class="pt-3">

<!--            <p id="score">NFT : 0</p>-->
        </div>
        <div id="quizzes">
            <!-- Cet élément sera utilisé pour afficher les quiz (ajoutés automatiquement) -->
        </div>
        <button id="submit-button" class="btn btn-dark my-3 position-relative start-50 translate-middle-x "  onclick="checkAnswers()" >Soumettre</button>
    </div>
    <?= $this->Html->script('/js/quizNFT.js') ?>
</main>
<?= $this->element('footer')?>
</body>
</html>
