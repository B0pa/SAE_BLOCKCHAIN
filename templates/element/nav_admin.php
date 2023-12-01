<?php
$currentURL = strtolower(basename($_SERVER['REQUEST_URI']));
$pageTitle = 'Erreur'; // Valeur par défaut

// Définissez les titres de page en fonction de l'URL
if ($currentURL === 'update') {
    $pageTitle = 'Update';
} elseif ($currentURL === 'login') {
    $pageTitle = 'Login';
} elseif ($currentURL === 'register') {
    $pageTitle = 'Register';
} elseif ($currentURL === 'updateactuality') {
    $pageTitle = 'Update actuality';
} elseif ($currentURL === 'updateinfo') {
    $pageTitle = 'Update info';
} elseif ($currentURL === 'updatequizz') {
    $pageTitle = 'Update quiz';
}

?>


<nav class="navbar navbar-dark bg-dark d-flex align-items-center fixed-top " style="height: 100px;">

    <?= $this->Html->link(
        $this->Html->image('home-update.png', ['class' => 'img-fluid h-100 image-nav bg-warning rounded-circle ','alt' => 'icon home admin']),
        ['controller'=> 'Users', 'action' => 'update'],
        [
            'class' => 'nav-link d-flex align-items-center',
            'escapeTitle' => false
        ]
    ) ?>

    <div class="bg-warning rounded-pill col-* px-5 py-1 mx-auto">
        <h1 class="h1 text-center"><?= $pageTitle ?></h1>
    </div>

    <?= $this->Html->link(
        $this->Html->image('logout.png', ['class' => 'img-fluid h-100 image-nav bg-warning rounded-circle ','alt' => 'icone logout']),
        ['controller'=> 'Users', 'action' => 'logout'],
        [
            'class' => 'nav-link d-flex align-items-center',
            'escapeTitle' => false
        ]
    ) ?>
</nav>
