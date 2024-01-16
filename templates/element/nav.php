<?php
$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', trim($urlPath, '/'));
$currentURL = strtolower(end($segments));
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
elseif ($currentURL === 'search') {
    $query = $_GET['query'] ?? 'Recherche';
    $pageTitle = 'Recherche : ' . $query;
}




?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<nav class="navbar navbar-dark bg-dark fixed-top col-12 " style="height: 100px;">
    <div class="container-fluid h-100 position-relative d-flex justify-content-center align-items-center col-12" >
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

        <div class="d-flex bg-warning rounded-pill px-md-5 px-3 ms-5 align-items-center justify-content-center h-auto position-absolute" style="left:50%; transform: translateX(-50%);">
            <h1 class="h1 text-center"><?= $pageTitle ?></h1>
        </div>
    </div>
</nav>
