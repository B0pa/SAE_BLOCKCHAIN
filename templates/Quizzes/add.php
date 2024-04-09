<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quiz $quiz
 */

// Lire le contenu du répertoire 'csv'
$dir = WWW_ROOT . 'csv';
$files = array_diff(scandir($dir), array('..', '.'));
?>


<main class="navmarge add-main" >
    <div class="add-conteneur">
        <div class="slideFromTop add-add-conteneur">
            <div class="add-add-action-conteneur" >
                <h2 class="heading"><?= __('Actions') ?></h2>
                <?= $this->Html->link(__('List Quiz'), ['action' => 'index'],
                    ['class' => 'add-add-actions']) ?>
            </div>
            <?= $this->Form->create($quiz, ['type' => 'file']) ?>
            <fieldset class="add-add-content-conteneur">
                <legend><?= __('Add Quiz') ?></legend>
                <div class="add-add-content-title">
                    <?php
                    echo $this->Form->control('level', ['options' => [1 => 1, 2 => 2, 3 => 3],
                        'class' => 'form-control bg-secondary'
                    ]);
                    echo $this->Form->control('question',['class' => 'form-control bg-secondary']);
                    //  Affichez les messages flash
                    $this->Flash->render()
                    ?>
                </div>

                <div class="add-add-content-content">
                    <?php
                    // bouton pour ajouter une réponse
                    echo $this->Form->button(__('Add answer'), ['id' => 'add-answer', 'class' => 'btn btn-secondary']);
                    // bouton pour supprimer une reponse
                    echo $this->Form->button(__('Remove answer'), ['id' => 'remove-answer', 'class' => 'btn btn-secondary']);

                    echo $this->Form->control('realanswer', ['type' => 'select',
                        'class' => 'form-control bg-secondary',
                        'id' => 'realanswer'
                    ]);
                    echo $this->Form->control('questionform', ['type' => 'select', 'options' => ['text' => 'Text', 'graphic' => 'Graphic', 'image' => 'Image'],
                        'class' => 'form-control bg-secondary'
                    ]);
                    ?>

                    <div id="textFields"></div>

                    <?php
                    echo $this->Form->control('category', ['type' => 'select', 'options' => ['blockchain' => 'Blockchain', 'danger' => 'Danger', 'nft' => 'NFT', 'crypto' => 'Crypto'],
                        'class' => 'form-control bg-secondary'
                    ]);
                    ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['id' => 'add-add-content-btn-add','class' => 'grow']) ?>
            <?= $this->Form->end() ?>
        </div>
        <aside  class="slideFromTop add-prev-conteneur">
            <h2 id="preview-question" style="text-align: center;padding:5px;"></h2>
            <canvas id="myChart"></canvas>
            <div  class="d-flex justify-content-around my-5">

                <label class="text-white" id = "label-answer1">
                    <input type="radio" id="preview-answer1" name="preview-answer" value="1">
                    <div id="imagePreview1" style="padding:20px;"></div>
                </label>

                <label class="text-white" id = "label-answer2" >
                    <input type="radio" id="preview-answer2" name="preview-answer" value="2">
                    <div id="imagePreview2" style="padding:20px;"></div>
                </label>

                <label class="text-white" id = "label-answer3">
                    <input type="radio" id="preview-answer3" name="preview-answer" value="3">
                    <div id="imagePreview3" style="padding:20px;"></div>
                </label>
        </aside>
    </div>
</main >

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        var nb_answer = 3;

        var questionformSelect = document.getElementById('questionform');
        var textFields = document.getElementById('textFields');
        var answerFields = [];

        // Fonction pour créer un champ de réponse
        function createAnswerField(type, index) {
            if (type === 'graphic') {
                var input = document.createElement('input'); // Créez un élément input
                input.type = 'text'; // Définir le type sur 'text'
                input.name = 'answer' + index; // Définir le nom sur 'answer1', 'answer2', etc.
                input.id = 'answer' + index; // Définir l'ID sur 'answer1', 'answer2', etc.
                input.classList.add('form-control', 'bg-secondary', 'answer-field'); // Ajoutez des classes
                textFields.appendChild(input); // Ajoutez-le au DOM (dans le div textFields)
                answerFields.push(input); // Ajoutez-le au tableau answerFields
            } else {
                var input = document.createElement('input'); // Créez un élément input
                input.type = type; // Définir le type
                input.name = 'answer' + index; // Définir le nom sur 'answer1', 'answer2', etc.
                input.id = 'answer' + index; // Définir l'ID sur 'answer1', 'answer2', etc.
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

        // Fonction pour mettre à jour les champs de réponse
        function updateAnswerFields() {
            var myChart;

            // Mettre à jour l'élément realAnswer
            var realAnswerSelect = document.getElementById('realanswer'); // Remplacez 'realanswer' par l'ID de votre élément select
            realAnswerSelect.innerHTML = ''; // Supprimez les options existantes
            for (let i = 1; i <= nb_answer; i++) {
                var option = document.createElement('option');
                option.value = i;
                option.text = i;
                realAnswerSelect.add(option);
            }

            // Vérifier si l'élément existe et si oui Supprimez les anciennes options de colonne
            var oldColumnSelect = document.getElementById('csvColumn');
            if (oldColumnSelect) {
                oldColumnSelect.remove();
            }

            clearAnswerFields();

            // En fonction de la sélection, créez les champs appropriés
            var questionFormValue = questionformSelect.value;
            if (questionFormValue === 'image') {
                // rendre invisible le champ canva
                document.getElementById('myChart').style.display = 'none';

                // pour nb_answer reponses
                for (var i = 1; i <= nb_answer; i++) {
                    createAnswerField('file', i);

                    document.getElementById('answer' + i).addEventListener('change', function() {
                        $('#imagePreview' + i).html('');
                        var total_file = document.getElementById("answer" + i).files.length;
                        for (var j = 0; j < total_file; j++) {
                            $('#imagePreview' + i).append("<img src='" + URL.createObjectURL(event.target.files[j]) + "' class='img-fluid w-75 mx-auto rounded-3 mt-2 mb-3' alt='accueil' style=''>");
                        }
                    });
                }
            } else if (questionFormValue === 'text'){
                // rendre invisible le champ canva
                document.getElementById('myChart').style.display = 'none';

                for (var i = 1; i <= nb_answer; i++) {
                    createAnswerField('text', i);
                    document.getElementById('answer' + i).addEventListener('input', function() {
                        document.getElementById('label-answer' + i).textContent = this.value;
                    });
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

                for (var i = 1; i <= nb_answer; i++) {
                    createAnswerField('graphic', i);
                    document.getElementById('answer' + i).addEventListener('input', function() {
                        document.getElementById('label-answer' + i).textContent = this.value;
                    });
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

        // Fonction pour gérer les champs en fonction de la sélection
        function handleQuestionFormChange() {
            // Mettre à jour les champs de réponse
            updateAnswerFields();
        }

        // Initial setup based on the current value
        handleQuestionFormChange();

        // Écoutez les changements de sélection
        questionformSelect.addEventListener('change', handleQuestionFormChange);

        // Ecouter l'appui sur le bouton + pour ajouter une réponse
        document.getElementById('add-answer').addEventListener('click', function() {
            event.preventDefault();
            nb_answer++;
            updateAnswerFields();
        });
        // Ecouter l'appui sur le bouton - pour supprimer une réponse
        document.getElementById('remove-answer').addEventListener('click', function() {
            event.preventDefault();
            if (nb_answer > 2) {
                nb_answer--;
            }
            updateAnswerFields();
        });

        //previsualisation de la question
        document.getElementById('question').addEventListener('input', function() {
            document.getElementById('preview-question').textContent = this.value;
        });

        document.getElementById('myChart').addEventListener('input', function() {
            document.getElementById('preview-myChart').textContent = this.value;
        });

    });

</script>
