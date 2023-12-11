<!DOCTYPE html>
<html lang="en-FR">
<head>
    <meta charset="UTF-8">
    <title>ACCUEIL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="bg-secondary">

<header>
    <nav class="container-fluid pt-3 bg-dark bg-dark d-flex fixed-top justify-content-between" style="height: 105px;">
        <div class="container-fluid h-100 d-flex justify-content-center align-items-center nav-rep" >

            <?= $this->Html->link(
                $this->Html->image('wallet.png', ['class' => 'img-fluid image-nav top-0 img-nav','alt' => 'accueil','style' => 'left:20px;']),
                ['controller' => 'Pages', 'action' => 'wallet'],
                [
                    'class' => 'nav-link d-flex align-items-center',
                    'escapeTitle' => false
                ]
            ) ?>

            <?= $this->Html->link(
                $this->Html->image('temp reel.png', ['class' => 'img-fluid image-nav top-0 img-nav','alt' => 'icone temp réel','style' => 'left:120px;']),
                ['controller' => 'Pages', 'action' => 'tempreel'],
                [
                    'class' => 'nav-link d-flex align-items-center',
                    'escapeTitle' => false
                ]
            ) ?>

            <div class="d-flex  bg-warning rounded-pill px-5 py-1 align-items-center justify-content-center h-auto title-nav centrer">
                <h1 class="h1 text-center  ">Accueil</h1>
            </div>
        </div>

    </nav>
</header>
<div class="d-flex flex-column flex-md-row mx-1 mt-5 pt-5 mx-md-5 " style="height:115vh" >
    <main class="flex-grow-1 flex-shrink-0">
        <div class="slideFromTop grow p-3 bg-dark text-white rounded mt-4 p-3 col-0 col-md-11 d-flex">

            <?= $this->Html->image('NFT.png', ['alt' => 'icone NFT', 'style' => 'height:100px' , 'class' => 'img-thumbnail img-fluid']); ?>



            <h2 class="h2 mx-auto">Les NFT</h2>

                <?= $this->Html->link(
                "NFT",
                ['controller'=> 'Articles', 'action' => 'nft'],
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
                ['controller'=> 'Articles', 'action' => 'crypto'],
                [
                    'class' => 'text-white text-decoration-none btn btn-secondary align-self-end',
                    'escapeTitle' => false
                ]
            ) ?>
        </div>

        <div class="slideFromTop grow p-3 bg-dark text-white rounded mt-4 p-3 col-0 col-md-11 d-flex" >

            <?= $this->Html->image('danger.png', ['alt' => 'icone danger', 'style' => 'height:100px', 'class' => 'img-thumbnail']); ?>

            <h2 class="h2 mx-auto" >Les dangers</h2>

                <?= $this->Html->link(
                "Danger",
                ['controller'=> 'Articles', 'action' => 'danger'],
                [
                    'class' => 'text-white text-decoration-none btn btn-secondary align-self-end',
                    'escapeTitle' => false
                ]
            ) ?>
        </div>

        <div class="slideFromTop grow p-3 bg-dark text-white rounded mt-4 p-3 col-0 col-md-11 d-flex" >


            <?= $this->Html->image('blockchain.jpg', ['alt' => 'blockchain', 'style' => 'height:100px', 'class' => 'img-thumbnail']); ?>
            <h2 class="h2 mx-auto">Les blockchain</h2>

                <?= $this->Html->link(
                "Blockchain",
                ['controller'=> 'Articles', 'action' => 'blockchain'],
                [
                    'class' => 'text-white text-decoration-none btn btn-secondary align-self-end',
                    'escapeTitle' => false
                ]
            ) ?>

        </div>

        <div class="slideFromTop grow p-3 bg-dark text-white rounded mt-4 p-3 col-0 col-md-11">
            <h2 class="h2 text-center" >Qui sommes-nous ?</h2>
        </div>
    </main>

    <?= $this->cell('Article') ?>
</div>


<?= $this->element('footer')?>

</body>
</html>
