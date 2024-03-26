<?php
    if ($count < count($quiz_lvl1)) {
        // Obtenir le quiz à l'index $count
        $quiz = array_slice($quiz_lvl1, $count, 1)[0];
        
        echo $count;
        echo $url;

        echo $quiz['question'];
        ?>
        <br>
        <?= 
        $this->Form->create(null, ['url' => ['controller' => 'Quizzes', 'action' => 'getAnswer']]);
        echo $this->Form->hidden('quizId', ['value' => $quiz['id']]);
        foreach ($quiz['answers'] as $answer) {
            echo $this->Form->radio('answer', ['value' => $answer['id'], 'label' => $answer['answer']]);
        }
        echo $this->Form->button('Submit');
        echo $this->Form->end();
        ?>
        <br>
        <?php 
    }
?>