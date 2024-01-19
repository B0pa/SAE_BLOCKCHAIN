<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
/** @var \App\Model\Entity\Quiz[] $quizes */
echo $this->Form->create(null, ['url' => ['action' => 'checkAnswersDanger']]) ;


foreach ($quizes as $index => $quiz) :

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
            <h2 class="text-center" ><?= $quiz->question ?></h2>

            <!-- Utilisez l'index de la boucle pour générer un identifiant unique -->
            <canvas id="myChart<?= $index ?>"></canvas>

            <script>
                // Stockez la valeur de csv_link dans une variable JavaScript
                var csv_link = "<?php echo $csv_link; ?>";
                var csv_col = "<?php echo $quiz->csv_columne; ?>";

                // Vérifiez si csv_link est un fichier CSV
                if (csv_link.endsWith('.csv')) {
                    console.log('Le fichier est un fichier CSV');
                    var csvFile = '/csv/' + csv_link;
                    console.log('csvFile: ' + csvFile);
                    fetch(csvFile)
                        .then(response => response.text())
                        .then(data => {
                            // Convertir les données CSV en tableau
                            const rows = data.split('\n');
                            const labels = rows.slice(1).map(row => row.split(',')[0]);
                            const values = rows.slice(1).map(row => row.split(',')[csv_col]);

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
            <h2 class="text-center" ><?= $quiz->question ?></h2>
        <?php endif; ?>
        <?php if ($quiz->questionform == "text" ): ?>
            <div>
                <?php echo $this->Form->control('reponse'. $quiz->id, [
                    'options' => [1 => $quiz->answer1, 2 => $quiz->answer2 , 3 => $quiz->answer3],
                    'type' => 'radio',
                    'label' => false
                ]);
                ?>
            </div>
        <?php endif; ?>

        <?php if ($quiz->questionform == "graphic" ): ?>
            <div  class="d-flex justify-content-around my-5">
                <?php echo $this->Form->control('reponse'. $quiz->id, [
                    'options' => [1 => $quiz->answer1, 2 => $quiz->answer2 , 3 => $quiz->answer3],
                    'type' => 'radio',
                    'label' => false
                ]);
                ?>
            </div>
        <?php endif; ?>
        <?php if ($quiz->questionform == "image") :?>
            <div class="d-flex justify-content-around my-5">
                <?php
                for ($i = 1; $i <= 3; $i++) {
                    echo '<label>';
                    echo $this->Html->image("upload/" . $quiz->{'answer'.$i}, ['class' => 'd-flex w-50 rounded-3 mt-2 mb-3','alt' => 'accueil','style' => '']);
                    echo '</label>';
                }
                ?>

            </div>
            <?php echo $this->Form->control('reponse'. $quiz->id, [
                'options' => [1 => " ", 2 => " " , 3 => " "],
                'type' => 'radio',
                'label' => false
            ]);
            ?>
        <?php endif; ?>
    </div>
    <?php
    endforeach;
    ?>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-secondary bg-dark text-white rounded-3 slideFromTop ']) ?>
    <?= $this->Form->end() ?>
</main>
</body>
