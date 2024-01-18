<?php
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Wallet</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">
    </head>
<body class="bg-secondary" >
<header>
    <?= $this->element('nav2')?>
</header>
<main class="mt-5 pt-5 justify-content-around d-md-flex col-sm- min-vh-100" >
    <div class="mt-3 d-flex align-items-center d-md-block" >
        <?= $this->Html->image('cryptobitcoin.png', ['class' => 'rounded-circle','alt' => 'crypto Bitcoin']); ?>
        <p class="justify-content-center ms-4 ms-md-0 text-md-center mt-md-2" ><?php echo $this->getRequest()->getCookie('crypto'); ?></p>
        <a href="">avoir sa propre crypto</a>
    </div>
    <div class="mt-3 d-flex align-items-center d-md-block" >
        <?= $this->Html->image('cryptoblockchain.png', ['class' => 'rounded-circle','alt' => 'crypto Blockchain']); ?>
        <p class="justify-content-center ms-4 ms-md-0 text-md-center mt-md-2"><?php echo $this->getRequest()->getCookie('blockchain'); ?></p>
        <a href="">Avoir son avatar</a>
    </div>
    <div class="mt-3 d-flex align-items-center d-md-block" >
        <?= $this->Html->image('cryptodanger.png', ['class' => 'rounded-circle','alt' => 'crypto Danger']); ?>
        <p class="justify-content-center ms-4  ms-md-0 text-md-center mt-md-2"><?php echo $this->getRequest()->getCookie('danger'); ?></p>
        <a href="">Avoir son justificatif</a>
    </div>
    <div class="mt-3 d-flex align-items-center d-md-block" >
        <?= $this->Html->image('cryptoNFT.png', ['class' => 'rounded-circle','alt' => 'crypto NFT']); ?>
        <p class="justify-content-center ms-4 ms-md-0 text-md-center mt-md-2"><?php echo $this->getRequest()->getCookie('nft'); ?></p>
        <a href="">Avoir son image personalisé</a>
    </div>

</main>  
<?= $this->element('footer')?>
</body>
</html>
