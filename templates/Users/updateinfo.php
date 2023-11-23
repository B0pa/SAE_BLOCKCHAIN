<?php

$pageType = strtolower(basename($_SERVER['REQUEST_URI']));

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

        <div class="col-8 ">

            <h1><?php echo $pageType ?></h1>

            <?= $this->Form->create() ?>

            <div class="form-group">
                <?= $this->Form->text('titre', [
                    'required' => true,
                    'class' => 'form-control',
                ]) ?>
            </div>

            <div class="form-group">
                <?= $this->Form->textarea('text', [
                    'required' => false,
                    'class' => 'form-control',
                ]) ?>
            </div>

            <div class="form-group">
                <?= $this->Form->file('image', ["class" => "form-control", "id" => "imageInput"]) ?>
            </div>

            <?= $this->Form->submit(__('valider')); ?>
            <?= $this->Form->end() ?>


        </div>

        <aside class="col-4 border border-dark overflow-auto">
            <div class="preview">
                <h2><?= $pageType ?></h2>
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
        $('input[name="titre"]').on('input', function() {
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





        });

    });
</script>

</body>
</html>
