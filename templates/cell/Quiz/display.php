<?php
if ($count < count($quizzes)) {
    // Obtenir le quiz à l'index $count
    $quiz = array_slice($quizzes, $count, 1)[0];

    echo $count;
    echo $url;

    echo $quiz['question'];
    ?>
    <br>
    <?=
    $this->Form->create(null, ['url' => ['controller' => 'Quizzes', 'action' => 'getAnswer']]);

    echo $this->Form->hidden('quizId', ['value' => $quiz['id']]);

    foreach ($quiz['answers'] as $answer) {
        echo $this->Form->radio('answer', [
            ['value' => $answer['num'], 'text' => $answer['answer']]
        ]);
    }

    echo $this->Form->button('Submit');
    echo $this->Form->end();
    ?>
    <br>
    <?php
}
?>

<?php echo $count; ?>
