<?php
if ($count < count($quizzes)) {
    // Obtenir le quiz à l'index $count
    $quiz = array_slice($quizzes, $count, 1)[0];

    echo $count;
    echo $url;

    echo $quiz['question'];
    ?>
    <h2 class="quizzes-questions"><?= $quiz['question']  ?></h2>
    <br>
    <?=
    $this->Form->create(null, ['url' => ['controller' => 'Quizzes', 'action' => 'getAnswer']]);

    echo $this->Form->hidden('quizId', ['value' => $quiz['id']]); ?>

    <div class="quizzes-answers" >
    <?php
    foreach ($quiz['answers'] as $answer) {
        echo $this->Form->radio('answer', [
            ['value' => $answer['num'], 'text' => $answer['answer'], 'class' => 'quizzes-answers-input']
        ]);
    } ?>
    </div>
    <?php
    echo $this->Form->button('Submit', ['class' => 'quizzes-submit-button']);
    echo $this->Form->end();
    ?>
    <br>
    <?php
}
?>

<?php echo $count; ?>

<script>
    
    function reloadinputChecked() {
        const radioInputs = document.querySelectorAll('.quizzes-answers-input');
        
        
        radioInputs.forEach(function(input) {
            input.addEventListener('change', function() {
                radioInputs.forEach(function(input) {
                    input.parentNode.style.backgroundColor = '';
                    input.parentNode.style.color = '#fff';
                    input.parentNode.style.transform = 'scale(1.00)'; 
                });
                if (input.checked) {
                    input.parentNode.style.backgroundColor = '#FFE30A';
                    input.parentNode.style.color = '#000';
                    input.parentNode.style.transform = 'scale(1.05)';
                }
            });
        });

    
    }
    
    reloadinputChecked();
    </script>