<?php

$currentURL = strtolower(basename($_SERVER['REQUEST_URI']));
$pageTitle = 'Erreur'; // Valeur par défaut
$crypto = '';
$nb = '';

if ($currentURL === 'quizzblockchain') {
    $pageTitle = 'Quizz Blockchain';
    $crypto = 'cryptoblockchain.png';
    $nb = $this->getRequest()->getCookie('blockchain');
} elseif ($currentURL === 'quizzdanger') {
    $crypto = 'cryptodanger.png';
    $pageTitle = 'Quizz Danger';
    $nb = $this->getRequest()->getCookie('danger');
} elseif ($currentURL === 'quizzcrypto') {
    $crypto ="cryptobitcoin.png";
    $pageTitle = 'Quizz Crypto';
    $nb = $this->getRequest()->getCookie('crypto');
} elseif ($currentURL === 'quizznft') {
    $crypto = "cryptoNFT.png";
    $pageTitle = 'Quizz NFT';
    $nb = $this->getRequest()->getCookie('nft');
}

?>

<nav class="navbar navbar-dark bg-dark d-flex align-items-center fixed-top position-relative" style="height: 100px;">
    <?= $this->Html->link(
        $this->Html->image('acceuil.png', ['class' => 'position-absolute img-fluid image-nav','alt' => 'accueil']),
        ['controller'=> 'Pages', 'action' => 'home'],
        [
            'class' => 'nav-link d-flex align-items-center',
            'escapeTitle' => false
        ]
    ) ?>


    <?= $this->Html->link(
        $this->Html->image('temp reel.png', ['class' => 'position-absolute top-0 img-fluid h-100 image-nav','style'=>' left:120px','alt' => 'icone temp réel']),
        ['controller'=> 'Pages', 'action' => 'tempreel'],
        [
            'class' => 'nav-link d-flex align-items-center',
            'escapeTitle' => false
        ]
    ) ?>


    <div class="d-flex">
        <?= $this->Html->image($crypto, ['class' => 'position-absolute top-0 img-fluid rounded-circle','style'=>' left:240px; height : 100px','alt' => 'icone temp réel']); ?>
        <p class="text-white position-absolute " style="left:360px;" > <?= $nb ?> </p>
    </div>
    <div class="bg-warning rounded-pill col-5 mx-auto">
        <h1 class="h1 text-center"><?= $pageTitle ?></h1>
    </div>


</nav>
