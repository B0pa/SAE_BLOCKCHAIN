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
<nav>
    <?= $this->element('nav3')?>
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
