<?php

$currentURL = strtolower(basename($_SERVER['REQUEST_URI']));
$pageTitle = 'Erreur'; // Valeur par défaut

// Définissez les titres de page en fonction de l'URL
if ($currentURL === 'tempreel') {
    $pageTitle = 'Temp Réel';
} elseif ($currentURL === 'wallet') {
    $pageTitle = 'Wallet';
}
?>




<nav class="navbar navbar-dark bg-dark d-flex align-items-center fixed-top" style="height: 100px;">
    <a href='/pages/home' class='nav-link d-flex align-items-center'><?= $this->Html->image('acceuil.png', ['class' => 'img-fluid','alt' => 'acceuil']); ?></a>

    <div class="bg-warning rounded-pill col-5 mx-auto">
        <h1 class="h1 text-center"><?= $pageTitle ?></h1>
    </div>
</nav>

