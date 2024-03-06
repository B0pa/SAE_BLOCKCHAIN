

<?php
/** @var \App\Model\Entity\Quiz[] $quizes */
echo $this->Form->create(null, ['url' => ['action' => 'checkAnswersBlockchain']]) ;


foreach ($quizes as $index => $quiz) :

$csv_link = $quiz->csv_link;

$quiz_num = 0;
?>
<?= $this->element('nav')?>
<main class="" style="color #FFF ">

    <div class="" style = "margin-top:100px">
        <p><?= $quiz->level ?></p>
        <?php if ($quiz->questionform == "graphic") :?>
            <h2 class="" style="color:#FFF" ><?= $quiz->question ?></h2>

            <!-- Utilisez l'index de la boucle pour générer un identifiant unique -->
            <canvas id="myChart<?= $index ?>"></canvas>

        <?php else: ?>
            <h2 class="" style="color:#FFF" ><?= $quiz->question ?></h2>
        <?php endif; ?>
        <?php if ($quiz->questionform == "text" ): ?>
    <i class="" style="color:#FFF"></i>
    <div class="" style="color:#FFF">
        <?php
        $radioOptions = [];
        foreach ($quiz->answers as $answer) {
            $radioOptions[] = ['value' => $answer->id, 'text' => $answer->answer, 'class' => 'me-2 mt-2'];
        }
        echo $this->Form->radio('reponse'. $quiz->id, $radioOptions, ['label' => true, 'class' => '']);
        ?>
    </div>
<?php endif; ?>

        <?php if ($quiz->questionform == "graphic" ): ?>
            <i class="" style="color:#FFF"></i>
            <div class="" style="color:#FFF">
                <?php
                echo $this->Form->radio('reponse'. $quiz->id, [
                    ['value' => 1, 'text' => $quiz->answer1, 'class' => 'me-2 mt-2'],
                    ['value' => 2, 'text' => $quiz->answer2, 'class' => 'me-2 mt-2'],
                    ['value' => 3, 'text' => $quiz->answer3, 'class' => 'me-2 mt-2']
                ], ['label' => true]);
                ?>
            </div>
        <?php endif; ?>
        <?php if ($quiz->questionform == "image") :?>
            <i class="" style="color:#FFF"></i>
            <div class="" style="color:#FFF">
                <?php
                    for ($i = 1; $i <= 3; $i++) 
                    {
                        echo '<label>';
                        echo $this->Html->image("upload/" . $quiz->{'answer'.$i}, ['alt' => 'accueil']);
                        echo '</label>';
                    }
                ?>
            </div>
            <div class="" style="color:#FFF">
                <?php
                echo $this->Form->radio('reponse'. $quiz->id, [
                    ['value' => 1, 'text' => $quiz->answer1, 'class' => 'me-2 mt-2'],
                    ['value' => 2, 'text' => $quiz->answer2, 'class' => 'me-2 mt-2'],
                    ['value' => 3, 'text' => $quiz->answer3, 'class' => 'me-2 mt-2']
                ], ['label' => true, 'class' => 'd-flex flex-column']);
                ?>
            </div>
        <?php endif; ?>
    </div>
    <?php
    endforeach;
    ?>
    <div class="" style="color:#FFF" >
        <?= $this->Form->button(__('Envoyer')) ?>
        <?= $this->Form->end() ?>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                        label: 'Value',
                        data: values,
                        fill: false,
                        borderColor: 'rgb(255, 193, 7)',
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
