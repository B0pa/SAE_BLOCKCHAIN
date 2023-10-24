<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ACCUEIL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-secondary" style="padding-top: 100px">


<nav class="navbar navbar-dark bg-dark d-flex align-items-center fixed-top" style="height: 100px;">
    <a href="/pages/wallet" class="nav-link d-flex align-items-center"><?= $this->Html->image('wallet.png', ['class' => 'img-fluid','alt' => 'icone wallet']); ?></a>
    <a  href="/pages/tempreel" class="nav-link d-flex align-items-center"><?= $this->Html->image('temp reel.png', ['class' => 'img-fluid h-100','alt' => 'icone temp réel']); ?></a>

    <div class="bg-warning rounded-pill col-5 mx-auto">
        <h1 class="h1 text-center">Accueil</h1>
    </div>

</nav>



<div class="d-flex row g-0">

<main class="flex-grow-1 flex-shrink-0 col-8 " >
        <div class="explication p-3 bg-dark text-white rounded mt-4 p-3">

            <?= $this->Html->image('NFT.png', ['alt' => 'icone NFT' ]); ?>

            <h2 class="h2" >Les NFT</h2>
            <div>
                <a href="/pages/explication">Explication</a>
            </div>
        </div>

        <div class="explication p-3 bg-dark text-white rounded mt-4 p-3">

            <?= $this->Html->image('crypto.png', ['alt' => 'icone cryptomonnais']); ?>

            <h2 class="h2" >Les Crypto</h2>
            <div>
                <a href="/pages/explication">Explication</a>
            </div>
        </div>

        <div class="explication p-3 bg-dark text-white rounded mt-4 p-3" >

            <?= $this->Html->image('danger.png', ['alt' => 'icone danger']); ?>

            <h2 class="h2" >Les dangers</h2>
            <div>
                <a href="/pages/explication">Explication</a>
            </div>
        </div>

        <div class="explication p-3 bg-dark text-white rounded mt-4 p-3" >
            <h2 class="h2" >Les blockchain</h2>

            <?= $this->Html->image('blockchain.jpg', ['alt' => 'blockchain']); ?>

            <div>
                <a href="/pages/explication">Explication</a>
            </div>
        </div>

        <div class="explication p-3 bg-dark text-white rounded mt-4 p-3"">
            <h2 class="h2" >Qui sommes-nous ?</h2>
        </div>
</main>

    <aside class="flex-shrink-0 text-white bg-dark col-4 p<">
        <div>
            <h2 class="h2" >Les actualités</h2>
            <a href="/pages/actualite">Actualité</a>
        </div>
    </aside>

</body>
</html>
