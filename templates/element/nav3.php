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

<nav class="navbar navbar-dark bg-dark d-flex align-items-center fixed-top" style="height: 100px;">
    <?= $this->Html->link(
        $this->Html->image('acceuil.png', ['class' => 'img-fluid image-nav','alt' => 'accueil']),
        ['controller'=> 'Pages', 'action' => 'home'],
        [
            'class' => 'nav-link d-flex align-items-center',
            'escapeTitle' => false
        ]
    ) ?>


    <?= $this->Html->link(
        $this->Html->image('temp reel.png', ['class' => 'img-fluid h-100 image-nav','alt' => 'icone temp réel']),
        ['controller'=> 'Pages', 'action' => 'tempreel'],
        [
            'class' => 'nav-link d-flex align-items-center',
            'escapeTitle' => false
        ]
    ) ?>


    <div class="d-flex ">
        <?= $this->Html->image($crypto, ['class' => ' rounded-circle','alt' => 'icone temp réel' , 'style' => 'height : 50px']); ?>
        <p class="text-white "> <?= $nb ?> </p>
    </div>
    <div class="d-flex bg-warning rounded-pill col-* px-5 py-1 mx-auto align-items-center justify-content-center h-auto" style="transform: translateX(-40%);">
        <h1 class="h1 text-center"><?= $pageTitle ?></h1>
    </div>


</nav>
