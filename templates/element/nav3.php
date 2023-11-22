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

<nav class="navbar navbar-dark bg-dark d-flex align-items-center fixed-top" style="height: 100px;">
    <a href='/pages/home' class='nav-link d-flex align-items-center'><?= $this->Html->image('acceuil.png', ['class' => 'img-fluid image-nav','alt' => 'acceuil']); ?></a>
    <a  href='/pages/tempreel' class='nav-link d-flex align-items-center'><?= $this->Html->image('temp reel.png', ['class' => 'img-fluid h-100 image-nav','alt' => 'icone temp réel']); ?></a>

    <div class="d-flex ">
        <?= $this->Html->image($crypto, ['class' => ' rounded-circle','alt' => 'icone temp réel' , 'style' => 'height : 50px']); ?>
        <p class="text-white "> <?= $nb ?> </p>
    </div>
    <div class="bg-warning rounded-pill col-5 mx-auto">
        <h1 class="h1 text-center"><?= $pageTitle ?></h1>
    </div>


</nav>
