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

<body>
<nav>
    <?= $this->element('nav3')?>
</nav>
<main>
    <div id="quiz-container">
        <div class="PTop">

<!--            <p id="score">Chain : 0</p>-->
        </div>
        <div id="quizzes" class="grid-container">
            <!-- Cet élément sera utilisé pour afficher les quiz (ajoutés automatiquement) -->
        </div>
        <button id="submit-button" onclick="checkAnswers()">Soumettre</button>
    </div>
    <?= $this->Html->script('/js/quizBlock.js') ?>
</main>
<?= $this->element('footer')?>
</body>
</html>
