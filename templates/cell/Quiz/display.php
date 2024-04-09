<?php
if ($count < count($quizzes)) {
    // Obtenir le quiz à l'index $count
    $quiz = $quizzes[$count];

    echo $quiz['question'];
    ?>
    <br>
    <?php
    if ($selectedAnswer != null) {
        $disabled = true;
    } else {
        $disabled = false;
        $selectedAnswer = null;
    }

    echo $this->Form->create(null, ['url' => ['controller' => 'Quizzes', 'action' => 'getAnswer']]);

    $answers = [];
    foreach ($quiz['answers'] as $answer) {
        $answerAttributes = ['value' => $answer['num'], 'text' => $answer['answer'], 'disabled' => $disabled];

        // Si l'utilisateur a choisi cette réponse, ajoutez une classe CSS
        if ($selectedAnswer == $answer['num']) {
            $answerAttributes['class'] = 'selected-answer';
        }

        // Si c'est la bonne réponse, ajoutez une autre classe CSS
        if ($quiz['realAnswer'] == $answer['num']) {
            $answerAttributes['class'] = isset($answerAttributes['class']) ? $answerAttributes['class'] . ' correct-answer' : 'correct-answer';
        }

        $answers[] = $answerAttributes;
    }

    echo $this->Form->radio('answer', $answers);

    echo $this->Form->button('Submit', ['disabled' => $disabled]);
    echo $this->Form->end();
    ?>
    <br>
    <?php
}
?>

<?php echo $count; ?>