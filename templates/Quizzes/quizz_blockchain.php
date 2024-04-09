<main class="quizzes-main navmarge">
    <div class="quizzes-conteneneur">
        <div id="quizCell">
            <?php
            echo $this->cell('Quiz', [$count]);
            ?>
        </div>
        <button id="decrementButton" class="quizzes-submit-button" >Previous</button>
        <button id="incrementButton" class="quizzes-submit-button" >Next</button>
        <?php
        echo $this->Form->postLink(
            'End Quiz', // Le texte du lien
            ['action' => 'endQuiz'], // L'URL à laquelle la requête POST est envoyée
            ['confirm' => 'Are you sure?'] // Un message de confirmation qui est affiché lorsque vous cliquez sur le lien
        );
        ?>
    </div>
</main>

<script>
   




    document.getElementById('incrementButton').addEventListener('click', function() {
        fetch('/quizzes/incrementCount')
            .then(response => response.text())
            .then(count => {

                // Ajoutez ce code pour recharger la cellule
                fetch('/quizzes/reloadQuizCell')
                    .then(response => response.text())
                    .then(html => {
                        var quizCell = document.getElementById('quizCell');
                        quizCell.innerHTML = html;
                        
                    });
            });
            reloadinputChecked();
    });

    document.getElementById('decrementButton').addEventListener('click', function() {
        fetch('/quizzes/decrementCount')
            .then(response => {
                return response.text();
            })
            .then(count => {

                // Ajoutez ce code pour recharger la cellule
                fetch('/quizzes/reloadQuizCell')
                    .then(response => response.text())
                    .then(html => {
                        var quizCell = document.getElementById('quizCell');
                        quizCell.innerHTML = html;
                    });
            });

            reloadinputChecked();
    });


    
</script>
