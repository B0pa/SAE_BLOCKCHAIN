<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div class="modal fade" id="cookieModal" tabindex="-1" aria-labelledby="cookieModalLabel" aria-hidden="true">
    <div class="modal-dialog text-white">
        <div class="modal-content bg-secondary border-3 border-dark">
            <div class="modal-header border-dark">
                <h5 class="modal-title" id="cookieModalLabel">Politique des cookies</h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Ce site utilise des cookies pour améliorer votre expérience. Ils servent à sauvegarder votre score. En continuant à utiliser ce site, vous acceptez notre utilisation des cookies.
            </div>
            <div class="modal-footer border-dark">
                <?php echo $this->Form->create(null, ['url' => ['controller' => 'Pages','action' => 'cookieAccept']]) ;?>
                <?= $this->Form->button(__('Accept'), ['class' => 'btn btn-warning text-white rounded-3 slideFromTop ']) ?>
                <?= $this->Form->end() ?>
                <?php echo $this->Form->create(null, ['url' => ['controller' => 'Pages','action' => 'cookieRefuse']]) ;?>
                <?= $this->Form->button(__('Refuse'), ['class' => 'btn btn-secondary bg-dark text-white rounded-3 slideFromTop ']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

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

        <?php else: ?>
            <h2 class="text-center" ><?= $quiz->question ?></h2>
        <?php endif; ?>
        <?php if ($quiz->questionform == "text" ): ?>
            <i class=" m-3 border-top border-2 border-white"></i>
            <div class="d-flex flex-column ms-5 fs-5">
                <?php
                echo $this->Form->radio('reponse'. $quiz->id, [
                    ['value' => 1, 'text' => $quiz->answer1, 'class' => 'me-2'],
                    ['value' => 2, 'text' => $quiz->answer2, 'class' => 'me-2'],
                    ['value' => 3, 'text' => $quiz->answer3, 'class' => 'me-2']
                ], ['label' => true, 'class' => '']);
                ?>
            </div>
        <?php endif; ?>

        <?php if ($quiz->questionform == "graphic" ): ?>
            <i class=" m-3 border-top border-2 border-white"></i>
            <div class="d-flex flex-column">
                <?php
                echo $this->Form->radio('reponse'. $quiz->id, [
                    ['value' => 1, 'text' => $quiz->answer1, 'class' => ''],
                    ['value' => 2, 'text' => $quiz->answer2],
                    ['value' => 3, 'text' => $quiz->answer3]
                ], ['label' => true, 'class' => 'd-flex flex-column']);
                ?>
            </div>
        <?php endif; ?>
        <?php if ($quiz->questionform == "image") :?>
            <i class=" m-3 border-top border-2 border-white"></i>
            <div class="d-flex justify-content-around my-5">
                <?php
                for ($i = 1; $i <= 3; $i++) {
                    echo '<label>';
                    echo $this->Html->image("upload/" . $quiz->{'answer'.$i}, ['class' => 'd-flex rounded-3 mt-2 mb-3','alt' => 'accueil','style' => 'height:200px;width:200px;']);
                    echo '</label>';
                }
                ?>

            </div>
            <div class="d-flex justify-content-around">
                <?php
                echo $this->Form->radio('reponse'. $quiz->id, [
                    ['value' => 1, 'text' => '', 'class' => ''],
                    ['value' => 2, 'text' => ''],
                    ['value' => 3, 'text' => '']
                ], ['label' => true, 'class' => 'd-flex flex-column']);
                ?>
            </div>
        <?php endif; ?>
    </div>
    <?php
    endforeach;
    ?>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-secondary bg-dark text-white rounded-3 slideFromTop ']) ?>
    <?= $this->Form->end() ?>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        if (<?php echo $this->getRequest()->getCookie('validation'); ?> == 0) {
            $('#cookieModal').modal('show');
        }

        $('#acceptCookies').click(function() {

            $('#cookieModal').modal('hide');
        });

        $('#disableCookies').click(function() {

            $('#cookieModal').modal('hide');
        });
    });
</script>
</body>
