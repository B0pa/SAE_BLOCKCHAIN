<?php
$currentURL = strtolower(basename($_SERVER['REQUEST_URI']));
$pageTitle = $currentURL; // Valeur par défaut

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


<nav class="container-fluid pt-3 bg-dark bg-dark d-flex fixed-top justify-content-between" style="height: 105px;">
    <div class="container-fluid h-100 d-flex align-items-center nav-rep" >
        <?= $this->Html->link(
            $this->Html->image('home-update.png', ['class' => 'img-fluid image-nav top-0 img-nav bg-warning rounded-circle ','alt' => 'icon home admin']),
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
            $this->Html->image('logout.png', ['class' => 'img-fluid image-nav top-0 img-nav bg-warning rounded-circle','alt' => 'icone logout']),
            ['controller'=> 'Users', 'action' => 'logout'],
            [
                'class' => 'nav-link d-flex align-items-center',
                'escapeTitle' => false
            ]
        ) ?>
    </div>
</nav>
