<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ACCUEIL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-secondary" >
<nav class="bg-dark d-flex" style="height: 75px;">
    <a href="/pages/wallet"><?= $this->Html->image('wallet.png', ['alt' => 'icone wallet']); ?></a>
    <a  href="/pages/tempreel"><?= $this->Html->image('temp reel.png', ['alt' => 'icone temp réel']); ?></a>

    <div class="bg-warning rounded-pill col-5 mx-auto">
        <h1 class="h1 text-center">Accueil</h1>
    </div>




</nav>


    <main>
        <div class="explication">

            <?= $this->Html->image('NFT.png', ['alt' => 'icone NFT']); ?>

            <h2 class="h2" >Les NFT</h2>
            <div>
                <a href="/pages/explication">Explication</a>
            </div>
        </div>

        <div class="explication">

            <?= $this->Html->image('crypto.png', ['alt' => 'icone cryptomonnais']); ?>

            <h2 class="h2" >Les Crypto</h2>
            <div>
                <a href="/pages/explication">Explication</a>
            </div>
        </div>

        <div class="explication" >

            <?= $this->Html->image('danger.png', ['alt' => 'icone danger']); ?>

            <h2 class="h2" >Les dangers</h2>
            <div>
                <a href="/pages/explication">Explication</a>
            </div>
        </div>

        <div class="explication" >
            <h2 class="h2" >Les blockchain</h2>

            <?= $this->Html->image('blockchain.jpg', ['alt' => 'blockchain']); ?>

            <div>
                <a href="/pages/explication">Explication</a>
            </div>
        </div>

        <div class="explication">
            <h2 class="h2" >Qui sommes-nous ?</h2>
        </div>
    </main>

    <aside>
        <div>
            <h2 class="h2" >Les actualités</h2>
        </div>
    </aside>

</body>
</html>
