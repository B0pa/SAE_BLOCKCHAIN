<?php
    if ($count < count($quizzes)) {
        // Obtenir le quiz à l'index $count
        $quiz = $quizzes[$count];

        echo $quiz['question'];
        ?>
        <br>
        <?php
        // Vérifier si une réponse a déjà été donnée pour ce quiz
        if (isset($selectedAnswers[$quiz['id']])) {
            // Obtenir la réponse de l'utilisateur
            $userAnswer = $selectedAnswers[$quiz['id']];

            // Trouver la bonne réponse
            $correctAnswer = array_filter($quiz['answers'], function($answer) {
                return $answer['correct'] == true;
            })[0]['num'];

            // Afficher les informations sur la réponse
            echo "Vous avez déjà répondu à ce quiz. ";
            echo "Votre réponse était : " . $userAnswer;
            echo "La bonne réponse est : " . $correctAnswer;

            // Désactiver le formulaire
            $disabled = true;
        } else {
            $disabled = false;
        }

        echo $this->Form->create(null, ['url' => ['controller' => 'Quizzes', 'action' => 'getAnswer']]);
        
        echo $this->Form->hidden('quizId', ['value' => $quiz['id']]);
        
        foreach ($quiz['answers'] as $answer) {
            echo $this->Form->radio('answer', [
                ['value' => $answer['num'], 'text' => $answer['answer'], 'disabled' => $disabled]
            ]);
        }
        
        echo $this->Form->button('Submit', ['disabled' => $disabled]);
        echo $this->Form->end();
        ?>
        <br>
        <?php 
    }
?>

<?php echo $count; ?>