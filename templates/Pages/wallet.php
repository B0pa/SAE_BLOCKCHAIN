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
        $counter = 1;

        if ($counter == 0) {
            $imagePathCrypto = '';
        } else {
            $imagePathCrypto = 'cryptoreward.png';
            echo $this->Html->image($imagePathCrypto, ['class' => 'd-flex mt-3 mx-auto imageCliquable', 'style' => 'height:100px', 'alt' => 'Recompense']);
        }
        ?>
    </div>
    <div class="mt-3 d-flex align-items-center d-md-block" >
        <?= $this->Html->image('cryptoblockchain.png', ['class' => 'rounded-circle ','alt' => 'crypto Blockchain']); ?>
        <p class="justify-content-center ms-4 ms-md-0 text-md-center mt-md-2"><?php echo $this->getRequest()->getCookie('blockchain'); ?></p>
        <?php
        $counter = $this->getRequest()->getCookie('blockchain');

        if ($counter == 0) {
            $imagePathBlockchain = 'blockchain1.jpg';
        } else if ($counter == 100){
            $imagePathBlockchain = 'blockchain2.jpg';
        } else if ($counter == 300){
            $imagePathBlockchain = 'blockchain3.jpg';
        } else if ($counter == 500){
            $imagePathBlockchain = 'blockchain4.jpg';
        }
        ?>
        <?php echo $this->Html->image($imagePathBlockchain, ['class' => 'd-flex mt-3 mx-auto imageCliquable', 'style' => 'height:300px', 'alt' => 'Recompense']); ?>
    </div>
    <div class="mt-3 d-flex align-items-center d-md-block" >

        <?= $this->Html->image('cryptodanger.png', ['class' => 'rounded-circle','alt' => 'crypto Danger']); ?>
        <p class="justify-content-center ms-4  ms-md-0 text-md-center mt-md-2"><?php echo $this->getRequest()->getCookie('danger'); ?></p>
        <?php
        $counter =  $this->getRequest()->getCookie('danger');

        if ($counter == 0) {
            $imagePathDanger = '';
        } else if ($counter == 500) {
            $imagePathDanger = 'certificat.png';
            echo $this->Html->image($imagePathDanger, ['class' => 'd-flex mt-3 mx-auto imageCliquable', 'style' => 'height:300px', 'alt' => 'Recompense']);
        }
        ?>
    </div>
    <div class="mt-3 d-flex align-items-center d-md-block" >
        <?= $this->Html->image('cryptoNFT.png', ['class' => 'rounded-circle','alt' => 'crypto NFT']); ?>
        <p class="justify-content-center ms-4 ms-md-0 text-md-center mt-md-2"><?php echo $this->getRequest()->getCookie('nft'); ?></p>
    </div>
    <?php // Gérer l'affichage du formulaire en fonction du nombre de cookies
    $counter = $this->getRequest()->getCookie('nft'); ?>

    <?= $this->Form->create(null, ['url' => ['controller' => 'Pages', 'action' => 'wallet']]) ?>

    <?php if ($counter > 0 && $counter <= 500) { ?>

        <div class="d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3 slideFromTop" >
            <h1>Questionnaire</h1>
            <p class="justify-content-center ms-4 ms-md-0 text-md-center mt-md-2">Vous vous considerez plutot comme: </p>
            <?= $this->Form->radio('question_1', ['Ser' => 'Sérieux', 'Opt' => 'Optimiste', 'Far' => 'Farceur']) ?>
        </div>

    <?php }
    if ($counter > 200 && $counter <= 500) { ?>

        <div class="d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3 slideFromTop" >
            <p class="justify-content-center ms-4 ms-md-0 text-md-center mt-md-2">Vous vous considerez plutot comme: </p>
            <?= $this->Form->radio('question_2', ['Ori' => 'Original', 'Sob' => 'Sobre', 'Lib' => 'Libre']) ?>
        </div>


    <?php } if ($counter == 500 ) {?>

        <div class="d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3 slideFromTop" >
            <p class="justify-content-center ms-4 ms-md-0 text-md-center mt-md-2">Votre couleur préférée dans cette liste: </p>
            <?= $this->Form->radio('question_3', ['Rou' => 'Rouge', 'Ble' => 'Bleu', 'Ver' => 'Vert']) ?>
        </div>

    <?php } else {
        $linkPathNft = 'home';
    }
    ?>

    <?php if ($counter > 0) { ?>
        <?= $this->Form->button('Soumettre') ?>
    <?php } ?>

    <?php if ($imageName) : ?>
        <h1>Votre Image Personnalisée</h1>
        <?= $this->Html->image($imageName, ['alt' => 'Image personnalisée']) ?>
    <?php endif; ?>

    <?= $this->Form->end() ?>
</main>
<?= $this->element('footer')?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Ajouter un gestionnaire d'événements au clic de l'image
        $('.imageCliquable').click(function() {
            // Ouvrir l'image en grand ou dans un nouvel onglet
            window.open($(this).attr('src'), '_blank');
        });
    });
    </body>
    </html>
