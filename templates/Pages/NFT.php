<?php
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NFT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-secondary">
<?= $this->element('nav')?>
<main>

    <?= $this->Html->image('NFT.png', ['class' => 'rounded-circle','alt' => 'NFT image']); ?>

    <div>
        <p></p>
    </div>
    <div class="btn btn-primary align-self-end " >
        <a href="/pages/quizzNFT" class="text-white text-decoration-none" >quizz</a>
    </div>

</main>

<?= $this->element('footer')?>

</body>
</html>
