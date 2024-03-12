<main>
<div style = "color:#FFF">
    <p>Quel est le nom du premier bloc de la blockchain ?</p>
    <?php 
        // afficher les liste des réponses
        foreach ($quiz_lvl1 as $quiz) {
            echo $quiz['question'];
            // afficher chaque réponse contenue dans la liste answers présente dans $quiz
            foreach ($quiz['answers'] as $answer) {
                echo $answer['answer'];
            }
        }
        foreach ($quiz_lvl2 as $quiz) {
            echo $quiz['question'];
            // afficher chaque réponse contenue dans la liste answers présente dans $quiz
            foreach ($quiz['answers'] as $answer) {
                echo $answer['answer'];
            }
        }
        foreach ($quiz_lvl3 as $quiz) {
            echo $quiz['question'];
            // afficher chaque réponse contenue dans la liste answers présente dans $quiz
            foreach ($quiz['answers'] as $answer) {
                echo $answer['answer'];
            }
        }
    ?>
    <div>
</div>
</main>