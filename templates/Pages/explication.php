<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Explication</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>


    <?= $this->element('nav')?>
    <div CLASS="separateur"></div>
    <main>
        <div>
            <div><h2>les NFT</h2></div>
            <?= $this->Html->image('NFT.png', ['alt' => 'icone NFT']); ?>
        </div>

        <div>
            <div><h2>les crypto</h2></div>
            <?= $this->Html->image('crypto.png', ['alt' => 'icone cryptomonnaies']); ?>
        </div>

        <div>
            <div><h2>les danger</h2></div>
            <?= $this->Html->image('danger.png', ['alt' => 'icone Danger']); ?>
        </div>
    </main>
    <footer>
        <div>
            <a href=""><h2> la blockchain</h2></a>
        </div>
    </footer>
</body>
