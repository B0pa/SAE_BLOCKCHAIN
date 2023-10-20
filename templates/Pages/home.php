<!DOCTYPE html>
<html lang="en-FR">
<head>
    <meta charset="UTF-8">
    <title>ACCUEIL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="bg-secondary">

<header>
    <nav class="navbar navbar-dark bg-dark d-flex fixed-top" style="height: 100px;">
        <a href="/pages/wallet" class="nav-link d-flex align-items-center"><?= $this->Html->image('wallet.png', ['class' => 'img-fluid','alt' => 'icone wallet']); ?></a>
        <a  href="/pages/tempreel" class="nav-link d-flex align-items-center"><?= $this->Html->image('temp reel.png', ['class' => 'img-fluid h-100','alt' => 'icone temp réel']); ?></a>

        <div class="bg-warning rounded-pill col-3 mx-auto align-self-center">
            <h1 class="h1 text-center ">Accueil</h1>
        </div>

    </nav>
</header>
<div class="d-flex mx-5" >
    <main class="flex-grow-1 flex-shrink-0" style="padding-top: 125px" >
        <div class="explication p-3 bg-dark text-white rounded mt-4 p-3 col-11 d-flex">

            <?= $this->Html->image('NFT.png', ['alt' => 'icone NFT', 'style' => 'height:100px' , 'class' => 'img-thumbnail']); ?>



<<<<<<< HEAD
            <h2 class="h2 mx-auto">Les NFT</h2>
            <div class="btn btn-secondary align-self-end" >
                <a href="/pages/explication" class="text-white text-decoration-none" >Exxplications</a>
=======
<div class="d-flex row g-0">

<main class="flex-grow-1 flex-shrink-0 col-8 " >
        <div class="explication p-3 bg-dark text-white rounded mt-4 p-3">

            <?= $this->Html->image('NFT.png', ['alt' => 'icone NFT' ]); ?>

            <h2 class="h2" >Les NFT</h2>
            <div>
                <a href="/pages/explication">Exxxplication</a>
>>>>>>> 1f686bd (boostrap h1 init)
            </div>
        </div>

        <div class="explication p-3 bg-dark text-white rounded mt-4 p-3 col-11 d-flex">

            <?= $this->Html->image('crypto.png', ['alt' => 'icone cryptomonnais', 'style' => 'height:100px', 'class' => 'img-thumbnail']); ?>

<<<<<<< HEAD
            <h2 class="h2 mx-auto">Les Crypto</h2>
            <div class="btn btn-secondary align-self-end" >
                <a href="/pages/explication" class="text-white text-decoration-none" >Explications</a>
=======
            <h2 class="h2" >Les Crypto</h2>
            <div>
                <a href="/pages/explication">Exxxplication</a>
>>>>>>> 1f686bd (boostrap h1 init)
            </div>
        </div>

        <div class="explication p-3 bg-dark text-white rounded mt-4 p-3 col-11 d-flex" >

            <?= $this->Html->image('danger.png', ['alt' => 'icone danger', 'style' => 'height:100px', 'class' => 'img-thumbnail']); ?>

<<<<<<< HEAD
            <h2 class="h2 mx-auto" >Les dangers</h2>
            <div class="btn btn-secondary align-self-end" >
                <a href="/pages/explication" class="text-white text-decoration-none" >Explications</a>
=======
            <h2 class="h2" >Les dangers</h2>
            <div>
                <a href="/pages/explication">Exxxplication</a>
>>>>>>> 1f686bd (boostrap h1 init)
            </div>
        </div>

        <div class="explication p-3 bg-dark text-white rounded mt-4 p-3 col-11 d-flex" >


<<<<<<< HEAD
            <?= $this->Html->image('blockchain.jpg', ['alt' => 'blockchain', 'style' => 'height:100px', 'class' => 'img-thumbnail']); ?>
            <h2 class="h2 mx-auto">Les blockchain</h2>
            <div class="btn btn-secondary align-self-end" >
                <a href="/pages/explication" class="text-white text-decoration-none" >Explications</a>
=======
            <div>
                <a href="/pages/explication">Exxxplication</a>
>>>>>>> 1f686bd (boostrap h1 init)
            </div>
        </div>

        <div class="explication p-3 bg-dark text-white rounded mt-4 p-3 col-11">
            <h2 class="h2 text-center" >Qui sommes-nous ?</h2>
        </div>
    </main>

    <aside class="flex-shrink-0 text-white bg-dark rounded col-3 p-3" style="margin-top:150px" >
        <div class="text-center" >
            <h2 class="h2">Les actualités</h2>
        </div>
        <div class="bg-secondary rounded-2 p-2" >
            <h3 class="h3 text-center">blabla</h3>
            <p class="text-center" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur provident veniam nihil nemo asperiores? Possimus rem quod officia similique eaque laudantium aperiam, doloremque molestias magni earum vel quis dolorem natus!</p>
        </div>
    </aside>
</div>


<footer class="bg-dark text-white text-center mt-4">
    <p class="mb-0">Tous droit réservé</p>
</footer>

</body>
</html>
