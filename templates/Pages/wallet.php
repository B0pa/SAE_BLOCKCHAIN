<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wallet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<header>
    <?= $this->element('nav2')?>
</header>
<main>
    <div>
        <?= $this->Html->image('cryptobitcoin.png', ['class' => 'rounded-circle','alt' => 'crypto Bitcoin']); ?>
        <p>0</p>
    </div>
    <div>
        <?= $this->Html->image('cryptoblockchain.png', ['class' => 'rounded-circle','alt' => 'crypto Blockchain']); ?>
        <p>0</p>
    </div>
    <div>
        <?= $this->Html->image('cryptodanger.png', ['class' => 'rounded-circle','alt' => 'crypto Danger']); ?>
        <p>0</p>
    </div>
    <div>
        <?= $this->Html->image('cryptoNFT.png', ['class' => 'rounded-circle','alt' => 'crypto NFT']); ?>
        <p>0</p>
    </div>

</main>
