<?php

/** @var \App\Model\Entity\Quiz[] $quizes */

foreach ($quizes as $quiz) :
?>
    <p><?= $quiz->level ?></p>
    <h2><?= $quiz->question ?></h2>
    <?php if ($quiz->questionform == "text") : ?>

        <p><?= $quiz->answer1 ?></p>
        <p><?= $quiz->answer2 ?></p>
        <p><?= $quiz->answer3 ?></p>

    <?php endif; ?>
    <?php if ($quiz->questionform == "image") :?>
        <?= $this->Html->image("upload/" . $quiz->answer1)?>
        <?= $this->Html->image("upload/" . $quiz->answer2)?>
        <?= $this->Html->image("upload/" . $quiz->answer3)?>
    <?php endif; ?>

<?php
endforeach;
?>




<body class="bg-secondary">
<?= $this->element('nav3')?>
<main>
    <div id="quiz-container">
        <div class="PTop">

<!--            <p id="score">Danger : 0</p>-->
        </div>
        <div id="quizzes" class="grid-container">
            <!-- Cet élément sera utilisé pour afficher les quiz (ajoutés automatiquement) -->
        </div>
        <button id="submit-button" onclick="checkAnswers()">Soumettre</button>
    </div>
    <?= $this->Html->script('/js/quizDanger.js') ?>
</main>
<?= $this->element('footer')?>
</body>
</html>


