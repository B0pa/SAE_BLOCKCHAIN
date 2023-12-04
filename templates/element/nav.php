<?php
$currentURL = strtolower(basename($_SERVER['REQUEST_URI']));
$pageTitle = 'Erreur'; // Valeur par défaut

// Définissez les titres de page en fonction de l'URL

if ($currentURL === 'actualite') {
    $pageTitle = 'Actualité';
}

?>


<nav class="navbar navbar-dark bg-dark fixed-top " style="height: 100px;">
    <div class="container-fluid h-100 position-relative d-flex justify-content-center align-items-center" >
        <?= $this->Html->link(
            $this->Html->image('acceuil.png', ['class' => 'img-fluid image-nav position-absolute top-0 ','alt' => 'accueil','style' => 'left:20px;']),
            ['controller'=> 'Pages', 'action' => 'home'],
            [
                'class' => 'nav-link',
                'escapeTitle' => false
            ]
        ) ?>

        <?= $this->Html->link(
            $this->Html->image('temp reel.png', ['class' => 'img-fluid image-nav position-absolute top-0 ','alt' => 'icone temp réel','style' => 'left:120px;']),
            ['controller'=> 'Pages', 'action' => 'tempreel'],
            [
                'class' => 'nav-link',
                'escapeTitle' => false
            ]
        ) ?>

        <div class="d-flex bg-warning rounded-pill px-5 py-1 align-items-center justify-content-center h-auto position-absolute" style="left:50%; transform: translateX(-50%);">
            <h1 class="h1 text-center"><?= $pageTitle ?></h1>
        </div>
    </div>
</nav>
