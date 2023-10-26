<!DOCTYPE html>
<html lang="en-FR">
<html lang="en-FR">
<head>
    <meta charset="UTF-8">
    <title>ACCUEIL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-secondary">

    <header>
        <nav class="navbar navbar-dark bg-dark d-flex fixed-top" style="height: 105px;">
            <a href="/pages/wallet" class="nav-link d-flex align-items-center"><?= $this->Html->image('wallet.png', ['class' => 'img-fluid','alt' => 'icone wallet']); ?></a>
            <a  href="/pages/tempreel" class="nav-link d-flex align-items-center"><?= $this->Html->image('temp reel.png', ['class' => 'img-fluid h-100','alt' => 'icone temp réel']); ?></a>

            <div class="d-flex bg-warning rounded-pill col-4 col-md-3 mx-auto align-items-center justify-content-center h-auto p-1">
                <h1 class="h1 text-center  ">Accueil</h1>
            </div>

        </nav>
    </header>
<div class="d-flex flex-column flex-md-row mx-1 mt-5 pt-5 mx-md-5" >
    <main class="flex-grow-1 flex-shrink-0">
            <div class="explication p-3 bg-dark text-white rounded mt-4 p-3 col-0 col-md-11 d-flex">
                
                    <?= $this->Html->image('NFT.png', ['alt' => 'icone NFT', 'style' => 'height:100px' , 'class' => 'img-thumbnail img-fluid']); ?>
                
                

                <h2 class="h2 mx-auto">Les NFT</h2>
                <div class="btn btn-secondary align-self-end" >
                    <a href="/pages/explication" class="text-white text-decoration-none" >Explications</a>
                </div>
            </div>
            <h2 class="h2 mx-auto">Les NFT</h2>
            <div class="btn btn-secondary align-self-end" >
                <a href="/pages/nft" class="text-white text-decoration-none" >Explications</a>
            </div>
        </div>

        <div class="explication p-3 bg-dark text-white rounded mt-4 p-3 col-0 col-md-11 d-flex">

                <?= $this->Html->image('crypto.png', ['alt' => 'icone cryptomonnais', 'style' => 'height:100px', 'class' => 'img-thumbnail']); ?>

            <h2 class="h2 mx-auto">Les Crypto</h2>
            <div class="btn btn-secondary align-self-end" >
                <a href="/pages/crypto" class="text-white text-decoration-none" >Explications</a>
            </div>
        </div>

        <div class="explication p-3 bg-dark text-white rounded mt-4 p-3 col-0 col-md-11 d-flex" >

                <?= $this->Html->image('danger.png', ['alt' => 'icone danger', 'style' => 'height:100px', 'class' => 'img-thumbnail']); ?>

            <h2 class="h2 mx-auto" >Les dangers</h2>
            <div class="btn btn-secondary align-self-end" >
                <a href="/pages/danger" class="text-white text-decoration-none" >Explications</a>
            </div>
        </div>

        <div class="explication p-3 bg-dark text-white rounded mt-4 p-3 col-0 col-md-11 d-flex" >


            <?= $this->Html->image('blockchain.jpg', ['alt' => 'blockchain', 'style' => 'height:100px', 'class' => 'img-thumbnail']); ?>
            <h2 class="h2 mx-auto">Les blockchain</h2>
            <div class="btn btn-secondary align-self-end" >
                <a href="/pages/blockchain" class="text-white text-decoration-none" >Explications</a>
            </div>
        </div>

        <div class="explication p-3 bg-dark text-white rounded mt-4 p-3 col-0 col-md-11">
            <h2 class="h2 text-center" >Qui sommes-nous ?</h2>
        </div>
    </main>

    <aside class="home-aside flex-shrink-0 text-white bg-dark rounded col-0 col-md-4 p-3 mt-4">
    <aside class="home-aside flex-shrink-0 text-white bg-dark rounded col-0 col-md-4 p-3 mt-4">
        <div class="text-center" >
            <h2 class="h2">Les actualités</h2>
        </div>
        <div class="bg-secondary rounded-2 p-2" >
            <h3 class="h3 text-center">blabla</h3>
            <p class="text-center" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur provident veniam nihil nemo asperiores? Possimus rem quod officia similique eaque laudantium aperiam, doloremque molestias magni earum vel quis dolorem natus!</p>
        </div>

        <div class="btn btn-secondary align-self-end " >
            <a href="/pages/actualite" class="text-white text-decoration-none" >Actualité</a>
        </div>
    </aside>
</div>
    
    
    <footer class="bg-dark text-white text-center mt-4">
        <p class="mb-0">Tous droit réservé</p>
    </footer>

</body>
</html>
