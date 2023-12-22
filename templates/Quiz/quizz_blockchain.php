<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
/** @var \App\Model\Entity\Quiz[] $quizes */
foreach ($quizes as $index => $quiz) :
    echo $this->Form->create($quiz);

    $csv_link = $quiz->csv_link;


    ?>
<body class="bg-secondary" >
    <header>
        <nav>
            <?= $this->element('nav3')?>
        </nav>
    </header>
    <main class="pt-5 mt-5" >

        <div class="d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3 slideFromTop">
            <p><?= $quiz->level ?></p>
            <?php if ($quiz->questionform == "graphic") :?>
                <p><?= $quiz->question ?></p>

                <!-- Utilisez l'index de la boucle pour générer un identifiant unique -->
                <canvas id="myChart<?= $index ?>"></canvas>

                <script>
                    // Stockez la valeur de csv_link dans une variable JavaScript
                    var csv_link = "<?php echo $csv_link; ?>";

                    // Vérifiez si csv_link est un fichier CSV
                    if (csv_link.endsWith('.csv')) {
                        console.log('Le fichier est un fichier CSV');
                        csvFile = '/csv/' + csv_link;
                        console.log('csvFile: ' + csvFile);
                        fetch(csvFile)
                            .then(response => response.text())
                            .then(data => {
                                // Convertir les données CSV en tableau
                                const rows = data.split('\n').slice(1);
                                const labels = rows.map(row => row.split(',')[0]);
                                const values = rows.map(row => row.split(',')[1]);
                                console.log('index: ' + <?= $index ?>);
                                // Détruisez l'ancien graphique s'il existe
                                if (window['myChart' + <?= $index ?>] instanceof Chart) {
                                    window['myChart' + <?= $index ?>].destroy();
                                }

                                // Créez le nouveau graphique
                                window['myChart' + <?= $index ?>] = new Chart(document.getElementById('myChart<?= $index ?>'), {
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
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            });
                    }
                </script>

            <?php else: ?>
                <h2><?= $quiz->question ?></h2>
            <?php endif; ?>
            <p><?= $quiz->level ?></p>
            <?php
            if ($quiz->questionform == "text"): ?>
                <label class="text-white" >
                    <?= $this->Form->control('reponse', [
                        'type' => 'radio',
                        'options' => [1 => $quiz->answer1],
                        'label' => false]) ?>
                </label>
                <label class="text-white" >
                    <?= $this->Form->control('reponse', [
                        'type' => 'radio',
                        'options' => [1 => $quiz->answer2],
                        'label' => false]) ?>
                </label>
                <label class="text-white" >
                    <?= $this->Form->control('reponse', [
                        'type' => 'radio',
                        'options' => [1 => $quiz->answer3],
                        'label' => false]) ?>
                </label>
            <?php endif;
            ?>
            <?php if ($quiz->questionform == "image") :?>
                <label class="d-flex justify-content-around" >
                    <?= $this->Form->radio('reponse', ['value' => 1]) ?>
                    <?= $this->Html->image("upload/" . $quiz->answer1, ['class' => 'd-flex img-fluid w-50 mx-auto rounded-3 mt-2 mb-3','alt' => 'accueil','style' => '']) ?>

                    <?= $this->Form->radio('reponse', ['value' => 2]) ?>
                    <?= $this->Html->image("upload/" . $quiz->answer2, ['class' => 'd-flex img-fluid w-50 mx-auto rounded-3 mt-2 mb-3','alt' => 'accueil','style' => '']) ?>

                    <?= $this->Form->radio('reponse', ['value' => 3]) ?>
                    <?= $this->Html->image("upload/" . $quiz->answer3, ['class' => 'd-flex img-fluid w-50 mx-auto rounded-3 mt-2 mb-3','alt' => 'accueil','style' => '']) ?>
                </label>
            <?php endif; ?>
            <?= $this->Form->submit(__('valider'), ['class' => 'btn btn-secondary']); ?>
            <?= $this->Form->end() ?>
            <?= $this->Flash->render() ?>
        </div>
        <?php
        endforeach;
        ?>
    </main>
</body>
