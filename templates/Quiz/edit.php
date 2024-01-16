<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quiz $quiz
 */
?>

<?php
// Lisez le contenu du répertoire 'csv'
$dir = WWW_ROOT . 'csv';
$files = array_diff(scandir($dir), array('..', '.'));
?>
<!-- Incluez Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<body class="bg-secondary pt-5" >
<?= $this->element('nav_admin')?>
<main class="mt-5"></main>
<div class="row col-12 p-3">
    <aside class="col">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $quiz->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $quiz->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Quiz'), ['action' => 'index'], ['class' => 'side-nav-item text-warning']) ?>
        </div>
    </aside>
    <div class="col-9 p-3 bg-dark rounded text-white">
        <div class="quiz content">
            <?= $this->Form->create($quiz, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Edit Quiz') ?></legend>
                <?php
                echo $this->Form->control('level', ['options' => [1 => 1, 2 => 2, 3 => 3],
                    'class' => 'form-control bg-secondary'
                ]);
                echo $this->Form->control('question',['class' => 'form-control bg-secondary']);
                //  Affichez les messages flash
                $this->Flash->render()
                ?>

                <!-- Créez un élément canvas pour le graphique -->
                <canvas id="myChart"></canvas>

                <?php
                echo $this->Form->control('realanswer', ['type' => 'select', 'options' => [1 => 1, 2 => 2, 3 => 3],
                    'class' => 'form-control bg-secondary'
                ]);
                echo $this->Form->control('questionform', ['type' => 'select', 'options' => ['text' => 'Text', 'graphic' => 'Graphic', 'image' => 'Image'],
                    'class' => 'form-control bg-secondary'
                ]);
                ?>

                <div id="textFields">
                </div>

                <?php
                echo $this->Form->control('category', ['type' => 'select', 'options' => ['blockchain' => 'Blockchain', 'danger' => 'Danger', 'nft' => 'NFT', 'crypto' => 'Crypto'],
                    'class' => 'form-control bg-secondary'
                ]);
                ?>


            </fieldset>
            <?= $this->Form->button(__('Submit'),['class' => 'btn btn-secondary mt-3']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
</main>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var questionformSelect = document.getElementById('questionform');
        var textFields = document.getElementById('textFields');
        var answerFields = [];

        // Fonction pour créer un champ de réponse
        function createAnswerField(type, index) {
            if (type === 'graphic') {

                var input = document.createElement('input'); // Créez un élément input
                input.type = 'text'; // Définir le type sur 'text'
                input.name = 'answer' + index; // Définir le nom sur 'answer1', 'answer2', etc.
                input.classList.add('form-control', 'bg-secondary', 'answer-field'); // Ajoutez des classes
                textFields.appendChild(input); // Ajoutez-le au DOM (dans le div textFields)
                answerFields.push(input); // Ajoutez-le au tableau answerFields
            } else {
                var input = document.createElement('input'); // Créez un élément input
                input.type = type; // Définir le type
                input.name = 'answer' + index; // Définir le nom sur 'answer1', 'answer2', etc.
                input.classList.add('form-control', 'bg-secondary', 'answer-field'); // Ajoutez des classes
                textFields.appendChild(input); // Ajoutez-le au DOM (dans le div textFields)
                answerFields.push(input); // Ajoutez-le au tableau answerFields
            }
        }

        // Fonction pour supprimer tous les champs de réponse
        function clearAnswerFields() {
            answerFields.forEach(function (field) {
                field.remove();
            });
            answerFields = [];
        }

        // Fonction pour gérer les champs en fonction de la sélection
        function handleQuestionFormChange() {
            var myChart;

            clearAnswerFields();

            // En fonction de la sélection, créez les champs appropriés
            var questionFormValue = questionformSelect.value;
            if (questionFormValue === 'image') {
                // rendre invisible le champ canva
                document.getElementById('myChart').style.display = 'none';
                for (var i = 1; i <= 3; i++) {
                    createAnswerField('file', i);
                }
            } else if (questionFormValue === 'text'){
                // rendre invisible le champ canva
                document.getElementById('myChart').style.display = 'none';
                for (var i = 1; i <= 3; i++) {
                    createAnswerField('text', i);
                }
            } else if (questionFormValue === 'graphic') {
                // rendre invisible le champ canva
                document.getElementById('myChart').style.display = 'block';
                // Créez un élément select qui liste tous les fichiers CSV du dossier csv
                var select = document.createElement('select');
                select.type = 'select';
                select.name = 'csv_link';
                select.id = 'csvFile';
                <?php foreach ($files as $file): ?>
                var option = document.createElement('option');
                option.value = '<?= $file ?>';
                option.id = 'csvFile';
                option.text = '<?= $file ?>';
                select.appendChild(option);
                <?php endforeach; ?>
                textFields.appendChild(select);
                answerFields.push(select);

                // Créez un élément select pour les colonnes
                var columnSelect = document.createElement('select');
                columnSelect.type = 'select';
                columnSelect.id = 'csvColumn';
                columnSelect.name = 'csv_columne';

                // Ajoutez le select des colonnes à la div textFields
                textFields.appendChild(columnSelect);

                for (var i = 1; i <= 3; i++) {
                    createAnswerField('graphic', i);
                }

                // Lorsque l'utilisateur sélectionne un fichier CSV, récupérez les données et créez le graphique
                document.getElementById('csvFile').addEventListener('change', function() {
                    var csvFile = '/csv/' + this.value;
                    console.log('csvFile: ' + csvFile);
                    fetch(csvFile)
                        .then(response => response.text())
                        .then(data => {
                            // Convertir les données CSV en tableau
                            const rows = data.split('\n');
                            const headers = rows[0].split(',');

                            // Ajoutez les en-têtes de colonne comme options dans le select des colonnes
                            headers.forEach(function(header, index) {
                                var option = document.createElement('option');
                                option.value = index;
                                option.text = header;
                                columnSelect.appendChild(option);
                            });

                            // Lorsque l'utilisateur sélectionne une colonne, mettez à jour le graphique pour afficher les données de cette colonne
                            columnSelect.addEventListener('change', function() {
                                var columnIndex = this.value;
                                const labels = rows.slice(1).map(row => row.split(',')[0]);
                                const values = rows.slice(1).map(row => row.split(',')[columnIndex]);

                                // Détruisez l'ancien graphique s'il existe
                                if (myChart) {
                                    myChart.destroy();
                                }

                                // Créez le nouveau graphique
                                myChart = new Chart(document.getElementById('myChart'), {
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

                            // Déclenchez manuellement l'événement change pour la première colonne
                            columnSelect.dispatchEvent(new Event('change'));
                        });
                });
            } else {
                // rendre invisible le champ canva
                document.getElementById('myChart').style.display = 'none';
            }
        }

        // Initial setup based on the current value
        handleQuestionFormChange();

        // Écoutez les changements de sélection
        questionformSelect.addEventListener('change', handleQuestionFormChange);
    });

</script>
