<?php
$currentURL = strtolower(basename($_SERVER['REQUEST_URI']));
$pageTitle = 'Erreur'; // Valeur par défaut

// Définissez les titres de page en fonction de l'URL
if ($currentURL === 'explication') {
    $pageTitle = 'Explication';
} elseif ($currentURL === 'actualite') {
    $pageTitle = 'Actualité';
} elseif ($currentURL === 'nft') {
    $pageTitle = 'NFT';
} elseif ($currentURL === 'danger') {
    $pageTitle = 'Danger';
} elseif ($currentURL === 'crypto') {
    $pageTitle = 'Cryptomonnaies';
} elseif ($currentURL === 'blockchain') {
    $pageTitle = 'Blockchain';
}

?>


<nav class="navbar navbar-dark bg-dark d-flex align-items-center fixed-top " style="height: 100px;">
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

    <div class="d-flex bg-warning rounded-pill col-* px-5 py-1 mx-auto align-items-center justify-content-center h-auto " style="transform: translateX(-40%);">
        <h1 class="h1 text-center"><?= $pageTitle ?></h1>
    </div>
</nav>
