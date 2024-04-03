<?php
    if ($count < count($quizzes)) {
        // Obtenir le quiz à l'index $count
        $quiz = $quizzes[$count];

        echo $quiz['question'];
        ?>
        <br>
        <?php
        // Vérifier si une réponse a déjà été donnée pour ce quiz
        echo $selectedAnswer;
        if ($selectedAnswer != null) {
            
            $disabled = true;
        } else {
            $disabled = false;
            $selectedAnswer = null;
        }

        echo $this->Form->create(null, ['url' => ['controller' => 'Quizzes', 'action' => 'getAnswer']]);

        $answers = [];
        foreach ($quiz['answers'] as $answer) {
            $answers[] = ['value' => $answer['num'], 'text' => $answer['answer'], 'disabled' => $disabled];
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