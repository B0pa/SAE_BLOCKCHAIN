<?php
// page.php

$pageType = strtolower(basename($_SERVER['REQUEST_URI']));
if ($this->request->is('post')) {
    $title = $this->request->getData('title');
    $text = $this->request->getData('text');
    $image = $this->request->getData('image');
}
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<br>
<br>
<br>
<br>
<br>

<body>

<div class="container mt-5">

    <div class="row">

        <div class="col-8">

            <h1><?php echo $pageType ?></h1>

            <?= $this->Form->create() ?>

                <div class="form-group">
                    <?= $this->Form->control('title') ?>
                </div>

                <div class="form-group">
                    <label>Texte :</label>
                    <textarea class="form-control" name="text"></textarea>
                </div>

                <div class="form-group">
                    <label>Image :</label>
                    <input type="file" class="form-control" id="imageInput">
                </div>

                <?= $this->Form->submit('Soumettre', ['class' => 'btn btn-primary']) ?>

            <?= $this->Form->end() ?>

            <?php  var_dump($title) ?>
            <?php  var_dump($image) ?>
            <?php  var_dump($text) ?>

        </div>

        <aside class="col-4 border border-dark ">
            <div class="preview">
                <H3><span id="display-title"></span></H3>
                <p><span id="display-text"></span></p>
                <div id="imagePreview"></div>
            </div>
        </aside>

    </div>

</div>

<script>

    $(function() {

        // Prévisualisation titre
        $('input[name="title"]').on('input', function() {
            $('#display-title').text($(this).val());
        });

        // Prévisualisation texte
        $('textarea[name="text"]').on('input', function() {
            $('#display-text').html($(this).val());
        });

        // Prévisualisation image
        $('#imageInput').change(function() {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').html('<img src="'+e.target.result+'" width="100%">');
            };
            reader.readAsDataURL(this.files[0]);
        });

        // Interception soumission formulaire
        $('form').submit(function(e){
            e.preventDefault();

            // Ici votre code de traitement JS des données
            // Au lieu du rechargement HTML

        });

    });
</script>

</body>
</html>
