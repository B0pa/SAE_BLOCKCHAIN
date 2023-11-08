<?php

$currentURL = strtolower(basename($_SERVER['REQUEST_URI']));
$pageTitle = 'Erreur'; // Valeur par défaut
$crypto = '';

if ($currentURL === 'quizzblockchain') {
    $pageTitle = 'Quizz Blockchain';
    $crypto = 'cryptoblockchain.png';
} elseif ($currentURL === 'quizzdanger') {
    $crypto = 'cryptodanger.png';
    $pageTitle = 'Quizz Danger';
} elseif ($currentURL === 'quizzcrypto') {
    $crypto ="cryptobitcoin.png";
    $pageTitle = 'Quizz Crypto';
} elseif ($currentURL === 'quizznft') {
    $crypto = "cryptoNFT.png";
    $pageTitle = 'Quizz NFT';
}

?>

<nav class="navbar navbar-dark bg-dark d-flex align-items-center fixed-top" style="height: 100px;">
    <a href='/pages/home' class='nav-link d-flex align-items-center'><?= $this->Html->image('acceuil.png', ['class' => 'img-fluid','alt' => 'acceuil']); ?></a>
    <a  href='/pages/tempreel' class='nav-link d-flex align-items-center'><?= $this->Html->image('temp reel.png', ['class' => 'img-fluid h-100','alt' => 'icone temp réel']); ?></a>


    <?= $this->Html->image($crypto, ['class' => 'img-fluid h-100','alt' => 'icone temp réel']); ?>
    <div class="bg-warning rounded-pill col-5 mx-auto">
        <h1 class="h1 text-center"><?= $pageTitle ?></h1>
    </div>


</nav>

