<?php

$currentURL = strtolower(basename($_SERVER['REQUEST_URI']));
$pageTitle = 'Erreur'; // Valeur par défaut
$crypto = '';
$nb = '';

if ($currentURL === 'quizz-blockchain') {
    $pageTitle = 'Quizz Blockchain';
    $crypto = 'cryptoblockchain.png';
    $nb = $this->getRequest()->getCookie('blockchain');
} elseif ($currentURL === 'quizz-danger') {
    $crypto = 'cryptodanger.png';
    $pageTitle = 'Quizz Danger';
    $nb = $this->getRequest()->getCookie('danger');
} elseif ($currentURL === 'quizzcrypto') {
    $crypto ="cryptobitcoin.png";
    $pageTitle = 'Quizz Crypto';
    $nb = $this->getRequest()->getCookie('crypto');
} elseif ($currentURL === 'quizz-n-f-t') {
    $crypto = "cryptoNFT.png";
    $pageTitle = 'Quizz NFT';
    $nb = $this->getRequest()->getCookie('nft');
}

?>

<nav class="container-fluid pt-3 bg-dark bg-dark d-flex fixed-top justify-content-between" style="height: 105px;">
    <div class="container-fluid h-100 d-flex align-items-center nav-rep" >
        <?= $this->Html->link(
            $this->Html->image('acceuil.png', ['class' => 'img-fluid image-nav top-0 img-nav','alt' => 'accueil','style' => 'left:20px;']),
            ['controller'=> 'Pages', 'action' => 'home'],
            [
                'class' => 'nav-link d-flex align-items-center',
                'escapeTitle' => false
            ]
        ) ?>


        <?= $this->Html->link(
            $this->Html->image('temp reel.png', ['class' => 'img-fluid image-nav top-0 img-nav','alt' => 'icone temp réel','style' => 'left:120px;']),
            ['controller'=> 'Pages', 'action' => 'tempreel'],
            [
                'class' => 'nav-link d-flex align-items-center',
                'escapeTitle' => false
            ]
        ) ?>


        <div class="d-flex align-items-center justify-content-center h-auto">
            <?= $this->Html->image($crypto, ['class' => 'img-fluid image-nav top-0 img-nav rounded-circle','alt' => 'icone temp réel' , 'style' => 'height:85px; left:220px']); ?>
            <p class="text-white position-absolute" style="left:310px;top:35px" > <?= $nb ?> </p>
        </div>
        <div class="d-flex  bg-warning rounded-pill px-5 py-1 align-items-center justify-content-center h-auto title-nav centrer" >
            <h1 class="h1 text-center"><?= $pageTitle ?></h1>
        </div>
    </div>

</nav>
