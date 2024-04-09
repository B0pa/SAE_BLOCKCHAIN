<?php
if ($count < count($quizzes)) {
    // Obtenir le quiz à l'index $count
    $quiz = $quizzes[$count];

    echo $quiz['question'];

    if ($quiz['questionform'] == "graphic" && isset($quiz['csv_link']) && !empty($quiz['csv_link'])) {
        // Afficher le graphique
        echo '<canvas id="myChart' . $count . '"></canvas>';
        echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
        echo '<script>';
        echo 'var csv_link = "' . $quiz['csv_link'] . '";';
        echo 'var csv_col = "' . $quiz['csv_columne'] . '";';
        echo 'if (csv_link.endsWith(".csv")) {';
        echo 'var csvFile = "/csv/" + csv_link;';
        echo 'fetch(csvFile).then(response => response.text()).then(data => {';
        echo 'const rows = data.split("\\n");';
        echo 'const labels = rows.slice(1).map(row => row.split(",")[0]);';
        echo 'const values = rows.slice(1).map(row => row.split(",")[csv_col]);';
        echo 'if (window["myChart' . $count . '"] instanceof Chart) {';
        echo 'window["myChart' . $count . '"].destroy();';
        echo '}';
        echo 'window["myChart' . $count . '"] = new Chart(document.getElementById("myChart' . $count . '"), {';
        echo 'type: "line",';
        echo 'data: {labels: labels, datasets: [{label: "My Dataset", data: values, fill: false, borderColor: "rgb(75, 192, 192)", tension: 0.1}]},';
        echo 'options: {scales: {y: {beginAtZero: true}}}});';
        echo '});}';
        echo '</script>';
    }

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
        $answerAttributes = ['value' => $answer['num'], 'disabled' => $disabled];

        // Si l'utilisateur a choisi cette réponse, ajoutez une classe CSS
        if ($selectedAnswer == $answer['num']) {
            $answerAttributes['class'] = 'selected-answer';
        }

        // Si c'est la bonne réponse, ajoutez une autre classe CSS
        if ($quiz['realAnswer'] == $answer['num']) {
            $answerAttributes['class'] = isset($answerAttributes['class']) ? $answerAttributes['class'] . ' correct-answer' : 'correct-answer';
        }

        // Si les réponses sont des images
        if ($quiz['questionForm'] == "image") {
            $answerAttributes['text'] = $this->Html->image($answer['answer'], ['alt' => 'Answer image']);
        } else {
            $answerAttributes['text'] = $answer['answer'];
        }
        

        $answers[] = $answerAttributes;
    }

    echo $this->Form->radio('answer', $answers);

    echo $this->Form->button('Submit', ['disabled' => $disabled]);
    echo $this->Form->end();
}
?>

<?php echo $count; ?>