<!DOCTYPE html>
<html lang="en-FR">

<head>
    <meta charset="UTF-8">
    <title>ACCUEIL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="bg-secondary">

<header>
    <nav class="container-fluid navbar navbar-dark bg-dark d-flex fixed-top justify-content-between" style="height: 105px;">

        <div class="d-flex">
            <?= $this->Html->link(
                $this->Html->image('wallet.png', ['class' => 'img-fluid h-100 image-nav', 'alt' => 'icone wallet']),
                ['controller' => 'Pages', 'action' => 'wallet'],
                [
                    'class' => 'nav-link d-flex align-items-center',
                    'escapeTitle' => false
                ]
            ) ?>

            <?= $this->Html->link(
                $this->Html->image('temp reel.png', ['class' => 'img-fluid h-100 image-nav', 'alt' => 'icone temp réel']),
                ['controller' => 'Pages', 'action' => 'tempreel'],
                [
                    'class' => 'nav-link d-flex align-items-center',
                    'escapeTitle' => false
                ]
            ) ?>
        </div>

        <div class="d-flex bg-warning rounded-pill col-* px-5 py-1 mx-auto align-items-center justify-content-center h-auto " style="transform: translateX(-40%);">
            <h1 class="h1 text-center  ">Accueil</h1>
        </div>


    </nav>
</header>
<div class="d-flex min-vh-100 flex-column flex-md-row mt-5 pt-5 mx-0 mx-md-5">
    <main class="flex-grow-1 flex-shrink-0 h-100">
        <div class="slideFromTop grow p-3 bg-dark text-white rounded mt-4 p-3 col-0 col-md-11 d-flex">

            <?= $this->Html->image('NFT.png', ['alt' => 'icone NFT', 'style' => 'height:100px', 'class' => 'img-thumbnail img-fluid']); ?>



            <h2 class="h2 mx-auto">Les NFT</h2>

            <?= $this->Html->link(
                "NFT",
                ['controller' => 'Articles', 'action' => 'nft'],
                [
                    'class' => 'text-white text-decoration-none btn btn-secondary align-self-end',
                    'escapeTitle' => false
                ]
            ) ?>
        </div>

        <div class="slideFromTop grow p-3 bg-dark text-white rounded mt-4 p-3 col-0 col-md-11 d-flex">

            <?= $this->Html->image('crypto.png', ['alt' => 'icone cryptomonnais', 'style' => 'height:100px', 'class' => 'img-thumbnail']); ?>

            <h2 class="h2 mx-auto">Les Crypto</h2>

            <?= $this->Html->link(
                "crypto",
                ['controller' => 'Articles', 'action' => 'crypto'],
                [
                    'class' => 'text-white text-decoration-none btn btn-secondary align-self-end',
                    'escapeTitle' => false
                ]
            ) ?>
        </div>

        <div class="slideFromTop grow p-3 bg-dark text-white rounded mt-4 p-3 col-0 col-md-11 d-flex">

            <?= $this->Html->image('danger.png', ['alt' => 'icone danger', 'style' => 'height:100px', 'class' => 'img-thumbnail']); ?>

            <h2 class="h2 mx-auto">Les dangers</h2>

            <?= $this->Html->link(
                "Danger",
                ['controller' => 'Articles', 'action' => 'danger'],
                [
                    'class' => 'text-white text-decoration-none btn btn-secondary align-self-end',
                    'escapeTitle' => false
                ]
            ) ?>
        </div>

        <div class="slideFromTop grow p-3 bg-dark text-white rounded mt-4 p-3 col-0 col-md-11 d-flex">


            <?= $this->Html->image('blockchain.jpg', ['alt' => 'blockchain', 'style' => 'height:100px', 'class' => 'img-thumbnail']); ?>
            <h2 class="h2 mx-auto">Les blockchain</h2>

            <?= $this->Html->link(
                "Blockchain",
                ['controller' => 'Articles', 'action' => 'blockchain'],
                [
                    'class' => 'text-white text-decoration-none btn btn-secondary align-self-end',
                    'escapeTitle' => false
                ]
            ) ?>

        </div>

        <div class="slideFromTop grow p-3 bg-dark text-white rounded mt-4 p-3 col-0 col-md-11">
            <h2 class="h2 text-center">Qui sommes-nous ?</h2>
        </div>
    </main>

    <aside class="slideFromTop home-aside text-white bg-dark rounded col-0 col-md-4 p-4 mt-4">
        <div class="text-center">
            <h2 class="h2">Les actualités</h2>
        </div>
        <div class="bg-secondary rounded-2 p-3">
            <h3 class="h3 text-center">Quelques liens de médias mis a jour régulièrement que nous trouvons
                intéressants</h3>
            <p class="text-center">La dernière vidéo de Hasheur:</p>
            <iframe src="https://www.youtube-nocookie.com/embed?listType=playlist&list=UULFhlTcWDE8gd4tsl_L727NrQ"
                    width="100%" height="240" allowfullscreen>
            </iframe>
        </div>
        <?= $this->Html->link(
            "Actualité",
            ['controller' => 'Pages', 'action' => 'actuality'],
            [
                'class' => 'mt-2 text-white text-decoration-none btn btn-secondary align-self-center',
                'escapeTitle' => false
            ]
        ) ?>

    </aside>
</div>


<?= $this->element('footer') ?>

</body>

</html>
