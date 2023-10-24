<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wallet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet">
</head>
<body>
<nav>
    <a href="/pages/home"><?= $this->Html->image('acceuil.png', ['alt' => 'acceuil']); ?></a>



    <div class="titrejaune">
        <h1>Wallet</h1>
    </div>
</nav>

<main>
    <div>
        <?= $this->Html->image('cryptobitcoin.png', ['alt' => 'crypto Bitcoin']); ?>
        <p>0</p>
    </div>
    <div>
        <?= $this->Html->image('cryptoblockchain.png', ['alt' => 'crypto Blockchain']); ?>
        <p>0</p>
    </div>
    <div>
        <?= $this->Html->image('cryptodanger.png', ['alt' => 'crypto Danger']); ?>
        <p>0</p>
    </div>
    <div>
        <?= $this->Html->image('cryptoNFT.png', ['alt' => 'crypto NFT']); ?>
        <p>0</p>
    </div>

</main>
