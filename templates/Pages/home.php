<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ACCEUIL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet">
</head>
<body>
<nav>
    <a><img alt="wallet"></a>
    <a><img alt="temp réel"></a>

    <div class="titrejaune">
        <h1>Accueil</h1>
    </div>




</nav>
<div CLASS="separateur"></div>
<div class="contenu">
    <main>
        <div class="explication">
        <?= $this->Html->image('NFT.png', ['alt' => 'NFT']); ?>
            <h2>Les NFT</h2>
            <div>
                <a>Eplication</a>
            </div>
        </div>

        <div class="explication">
        <?= $this->Html->image('crypto.png', ['alt' => 'crypto']); ?>
            <h2>Les Crypto</h2>
            <div>
                <a>Eplication</a>
            </div>
        </div>

        <div class="explication" >
        <?= $this->Html->image('danger.png', ['alt' => 'danger']); ?>
            <h2>Les dangers</h2>
            <div>
                <a>Eplication</a>
            </div>
        </div>

        <div class="explication" >
            <h2>Les blockchain</h2>
            <?= $this->Html->image('blockchain.jpg', ['alt' => 'danger']); ?>
            <div>
                <a>Eplication</a>
            </div>
        </div>

        <div class="explication">
            <h2>Qui sommes-nous ?</h2>
        </div>
    </main>

    <aside>
        <div>
            <h2>Les actualités</h2>
        </div>
    </aside>
</div>
</body>
</html>
