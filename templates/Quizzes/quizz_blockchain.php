<main style="margin-top : 200px">
    <div style = "color:#FFF">
        <div id="quizCell">
            <?php echo $this->cell('Quiz', [$count]); ?>
        </div>
        <button id="decrementButton">Previous</button>
        <button id="incrementButton">Next</button>
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

                    // Déplacez cette ligne ici
                    var countElement = document.getElementById('count');
                    countElement.textContent = count;
                });
        });
});

document.getElementById('decrementButton').addEventListener('click', function() {
    fetch('/quizzes/decrementCount')
        .then(response => response.text())
        .then(count => {
            
            // Ajoutez ce code pour recharger la cellule
            fetch('/quizzes/reloadQuizCell')
                .then(response => response.text())
                .then(html => {
                    var quizCell = document.getElementById('quizCell');
                    quizCell.innerHTML = html;

                    // Déplacez cette ligne ici
                    var countElement = document.getElementById('count');
                    countElement.textContent = count;
                });
        });
});
</script>
