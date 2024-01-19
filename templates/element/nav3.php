<?php

$currentURL = strtolower(basename($_SERVER['REQUEST_URI']));
$pageTitle = 'Erreur'; // Valeur par défaut
$crypto = '';
$nb = '';

if ($currentURL === 'quizz-blockchain') {
    $pageTitle = 'Quiz Blockchain';
    $crypto = 'cryptoblockchain.png';
    $nb = $this->getRequest()->getCookie('blockchain');
} elseif ($currentURL === 'quizz-danger') {
    $crypto = 'cryptodanger.png';
    $pageTitle = 'Quiz Danger';
    $nb = $this->getRequest()->getCookie('danger');
} elseif ($currentURL === 'quizzcrypto') {
    $crypto ="cryptobitcoin.png";
    $pageTitle = 'Quiz Crypto';
    $nb = $this->getRequest()->getCookie('crypto');
} elseif ($currentURL === 'quizz-n-f-t') {
    $crypto = "cryptoNFT.png";
    $pageTitle = 'Quiz NFT';
    $nb = $this->getRequest()->getCookie('nft');
}

?>

<nav class="navbar navbar-dark bg-dark d-flex align-items-center fixed-top" style="height: 100px;">
    <div class="container-fluid h-100 position-relative d-flex justify-content-center align-items-center" >
        <?= $this->Html->link(
            $this->Html->image('acceuil.png', ['class' => 'img-fluid image-nav position-absolute top-0 ','alt' => 'accueil','style' => 'left:20px;']),
            ['controller'=> 'Pages', 'action' => 'home'],
            [
                'class' => 'nav-link d-flex align-items-center',
                'escapeTitle' => false
            ]
        ) ?>

        <?= $this->Html->link(
            $this->Html->image('temp reel.png', ['class' => 'img-fluid image-nav position-absolute top-0 ','alt' => 'icone temp réel','style' => 'left:120px;']),
            ['controller'=> 'Pages', 'action' => 'tempreel'],
            [
                'class' => 'nav-link d-flex align-items-center',
                'escapeTitle' => false
            ]
        ) ?>


        <div class="d-flex ">
            <?= $this->Html->image($crypto, ['class' => 'img-fluid image-nav position-absolute top-0 rounded-circle','alt' => 'icone temp réel' , 'style' => 'height:85px; left:220px']); ?>
            <p class="text-white position-absolute" style="left:310px;top:35px" > <?= $nb ?> </p>
        </div>
        <div id="titrenav3" class="d-flex bg-warning rounded-pill px-5 align-items-center justify-content-center h-auto position-absolute" >
            <h1 class="h1 text-center"><?= $pageTitle ?></h1>
        </div>
    </div>
</nav>
