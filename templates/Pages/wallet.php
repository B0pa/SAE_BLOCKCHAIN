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
    <?php
    $counter = $this->getRequest()->getCookie('crypto');

    if ($counter == 0) {
        $imagePathCrypto = 'crypto1.jpg';
    } else {
        $imagePathCrypto = 'crypto2.jpg';
    }
    ?>
    <?php echo $this->Html->image($imagePathCrypto, ['class' => 'd-flex mt-3 mx-auto ', 'style' => 'height:400px', 'alt' => 'Recompense']); ?>
    </div>
    <div class="mt-3 d-flex align-items-center d-md-block" >
        <?= $this->Html->image('cryptoblockchain.png', ['class' => 'rounded-circle','alt' => 'crypto Blockchain']); ?>
        <p class="justify-content-center ms-4 ms-md-0 text-md-center mt-md-2"><?php echo $this->getRequest()->getCookie('blockchain'); ?></p>
        <?php
        $counter = $this->getRequest()->getCookie('blockchain');

        if ($counter == 0) {
            $imagePathBlockchain = 'blockchain1.jpg';
        } else {
            $imagePathBlockchain = 'blockchain2.jpg';
        }
        ?>
        <?php echo $this->Html->image($imagePathBlockchain, ['class' => 'd-flex mt-3 mx-auto ', 'style' => 'height:400px', 'alt' => 'Recompense']); ?>
    </div>
    <div class="mt-3 d-flex align-items-center d-md-block" >
        <?= $this->Html->image('cryptodanger.png', ['class' => 'rounded-circle','alt' => 'crypto Danger']); ?>
        <p class="justify-content-center ms-4  ms-md-0 text-md-center mt-md-2"><?php echo $this->getRequest()->getCookie('danger'); ?></p>
        <?php
    $counter = $this->getRequest()->getCookie('danger');

    if ($counter == 0) {
        $imagePathDanger = 'certificat.png';
    } else {
        $imagePathDanger = 'crypto2.jpg';
    }
    ?>
    <?php echo $this->Html->image($imagePathDanger, ['class' => 'd-flex mt-3 mx-auto ', 'style' => 'height:400px', 'alt' => 'Recompense']); ?>
    </div>
    <div class="mt-3 d-flex align-items-center d-md-block" >
        <?= $this->Html->image('cryptoNFT.png', ['class' => 'rounded-circle','alt' => 'crypto NFT']); ?>
        <p class="justify-content-center ms-4 ms-md-0 text-md-center mt-md-2"><?php echo $this->getRequest()->getCookie('nft'); ?></p>
    </div>

</main>
<?= $this->element('footer')?>
</body>
</html>