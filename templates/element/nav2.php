<?php

$currentURL = strtolower(basename($_SERVER['REQUEST_URI']));
$pageTitle = 'Erreur'; // Valeur par défaut

// Définissez les titres de page en fonction de l'URL
if ($currentURL === 'tempreel') {
    $pageTitle = 'Temps Réel';
} elseif ($currentURL === 'wallet') {
    $pageTitle = 'Wallet';
}elseif ($currentURL === 'actuality') {
    $pageTitle = 'Actualités';
}
?>


<nav class="navbar navbar-dark bg-dark fixed-top" style="height: 100px;">
    <div class="container-fluid h-100 d-flex align-items-center nav-rep" >
        <?= $this->Html->link(
            $this->Html->image('acceuil.png', ['class' => 'img-fluid image-nav top-0 img-nav','alt' => 'accueil']),
            ['controller'=> 'Pages', 'action' => 'home'],
            [
                'class' => 'nav-link d-flex align-items-center',
                'escapeTitle' => false
            ]
        ) ?>
        <div class="d-flex  bg-warning rounded-pill px-5 align-items-center justify-content-center h-auto title-nav">
            <h1 class="h1 text-center"><?= $pageTitle ?></h1>
        </div>
    </div>

</nav>
