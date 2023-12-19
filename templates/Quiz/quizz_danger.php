<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
/** @var \App\Model\Entity\Quiz[] $quizes */
foreach ($quizes as $quiz) :
    echo $this->Form->create($quiz);
    ?>
    <nav>
        <?= $this->element('nav3')?>
    </nav>

    <div class="d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3 slideFromTop">
        <p><?= $quiz->level ?></p>
        <h2><?= $quiz->question ?></h2>
        <?php
        if ($quiz->questionform == "text"): // reponse au format texte
            echo $this->Form->control('reponse', [
                'type' => 'radio',
                'options' => [
                    1 => $quiz->answer1,
                    2 => $quiz->answer2,
                    3 => $quiz->answer3
                ],
                'class' => 'd-flex img-fluid w-75 mx-auto rounded-3 mt-2 mb-3','alt' => 'accueil','style' => ''
            ]);
        endif;
        ?>
        <?php if ($quiz->questionform == "image") :?>
            <label>
                <?= $this->Form->radio('reponse', ['value' => 1]) ?>
                <?= $this->Html->image("upload/" . $quiz->answer1, ['class' => 'd-flex img-fluid w-75 mx-auto rounded-3 mt-2 mb-3','alt' => 'accueil','style' => '']) ?>
            </label>
            <label>
                <?= $this->Form->radio('reponse', ['value' => 2]) ?>
                <?= $this->Html->image("upload/" . $quiz->answer2, ['class' => 'd-flex img-fluid w-75 mx-auto rounded-3 mt-2 mb-3','alt' => 'accueil','style' => '']) ?>
            </label>
            <label>
                <?= $this->Form->radio('reponse', ['value' => 3]) ?>
                <?= $this->Html->image("upload/" . $quiz->answer3, ['class' => 'd-flex img-fluid w-75 mx-auto rounded-3 mt-2 mb-3','alt' => 'accueil','style' => '']) ?>
            </label>
        <?php endif; ?>
        <?= $this->Form->submit(__('valider'), ['class' => 'btn btn-secondary']); ?>
        <?= $this->Form->end() ?>
        <?= $this->Flash->render() ?>
    </div>
<?php
endforeach;
?>
<canvas id="myChart"></canvas>

<script>
fetch('/csv/2015-1-1.csv')
    .then(response => response.text())
    .then(data => {
        // Convertir les données CSV en tableau
        const rows = data.split('\n').slice(1);
        const labels = rows.map(row => row.split(',')[0]);
        const values = rows.map(row => row.split(',')[1]);

        // Créer le graphique
        new Chart(document.getElementById('myChart'), {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'My Dataset',
                    data: values,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            }
        });
    });
</script>