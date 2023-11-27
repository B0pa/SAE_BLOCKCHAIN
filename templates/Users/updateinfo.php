<?php
// page.php

$pageType = strtolower(basename($_SERVER['REQUEST_URI']));

$title = $this->request->getData('title');
$text = $this->request->getData('text');
$image = $this->request->getData('image');
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<br>
<br>
<br>
<br>
<br>

<body class="bg-secondary" >

<div class="container mt-5">

    <div class="row">

        <div class="col-8">

            <h1><?php echo $pageType ?></h1>

            <form method="post">

                <div class="form-group">
                    <label>Titre :</label>
                    <input type="text" class="form-control" name="title">
                </div>

                <div class="form-group">
                    <label>Texte :</label>
                    <textarea class="form-control" name="text"></textarea>
                </div>

                <div class="form-group">
                    <label>Image :</label>
                    <input type="file" class="form-control" id="imageInput">
                </div>

            </form>

        </div>

        <aside class="col-4 border border-dark overflow-auto ">
            <div class="preview">
                <h3 class="h3 text-center" ><span id="display-title"></span></h3>
                <p class="text-center" ><span id="display-text"></span></p>
                <div id="imagePreview" ></div>
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
                $('#imagePreview').html('<img src="'+e.target.result+'" width="100%" class="rounded-3">');
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
