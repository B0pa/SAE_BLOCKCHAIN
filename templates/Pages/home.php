<?php // use log;
use Cake\Log\Log; ?>

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
    <nav class="container-fluid navbar navbar-dark bg-dark d-flex fixed-top justify-content-between" style="height: 100px;">
        <div class="container-fluid h-100 position-relative d-flex justify-content-center align-items-center" >

            <?= $this->Html->link(
                $this->Html->image('wallet.png', ['class' => 'img-fluid image-nav position-absolute top-0 ','alt' => 'accueil','style' => 'left:20px;']),
                ['controller' => 'Pages', 'action' => 'wallet'],
                [
                    'class' => 'nav-link d-flex align-items-center',
                    'escapeTitle' => false
                ]
            ) ?>

            <?= $this->Html->link(
                $this->Html->image('temp reel.png', ['class' => 'img-fluid image-nav position-absolute top-0 ','alt' => 'icone temp réel','style' => 'left:120px;']),
                ['controller' => 'Pages', 'action' => 'tempreel'],
                [
                    'class' => 'nav-link d-flex align-items-center',
                    'escapeTitle' => false
                ]
            ) ?>

            <div class="d-flex  bg-warning rounded-pill px-md-5 px-4 ms-4 align-items-center justify-content-center h-auto position-absolute centrer">
                <h1 class="h1 text-center ">Accueil</h1>
            </div>
        </div>
    </nav>
</header>
<div class="d-flex flex-column flex-md-row mx-1 mt-5 pt-5 mx-md-5 " style="height:auto" >
    <main class="col col-12 col-md-8">


    <div class="modal fade" id="cookieModal" tabindex="-1" aria-labelledby="cookieModalLabel" aria-hidden="true">
            <div class="modal-dialog text-white">
                <div class="modal-content bg-secondary border-3 border-dark">
                    <div class="modal-header border-dark">
                        <h5 class="modal-title" id="cookieModalLabel">Politique des cookies</h5>
                        <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Ce site utilise des cookies pour améliorer votre expérience. Ils servent à sauvegarder votre score. En continuant à utiliser ce site, vous acceptez notre utilisation des cookies.
                    </div>
                    <div class="modal-footer border-dark">
                        <?php echo $this->Form->create(null, ['url' => ['action' => 'cookieAccept']]) ;?>
                        <?= $this->Form->button(__('Accept'), ['class' => 'btn btn-warning text-white rounded-3 slideFromTop ']) ?>
                        <?= $this->Form->end() ?>
                        <?php echo $this->Form->create(null, ['url' => ['action' => 'cookieRefuse']]) ;?>
                        <?= $this->Form->button(__('Refuse'), ['class' => 'btn btn-secondary bg-dark text-white rounded-3 slideFromTop ']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>


        <a class="text-decoration-none " href="<?= $this->Url->build(['controller'=> 'Articles', 'action' => 'nft']) ?>">
            <div class="d-flex slideFromTop grow p-3 bg-dark text-white rounded mt-4 p-3 col-12 col-md-11 align-items-center" style="justify-content: space-between;">
                <div>
                    <?= $this->Html->image('NFT.gif', ['alt' => 'icone NFT', 'style' => 'height:100px' , 'class' => 'img-thumbnail img-fluid']); ?>
                </div>
                <div class="px-3" style="margin: auto;">
                    <h2 class="h2 text-center">Les NFT</h2>
                    <p>Jetons numériques uniques représentant un objet virtuel. Spéculatifs et sujets aux arnaques.</p>
                </div>
            </div>
        </a>

        <a class="text-decoration-none " href="<?= $this->Url->build(['controller'=> 'Articles', 'action' => 'crypto']) ?>">
            <div class="slideFromTop grow p-3 bg-dark text-white rounded mt-4 p-3 col-12 col-md-11 d-flex align-items-center" style="justify-content: space-between;">
                <div>
                    <?= $this->Html->image('crypto.gif', ['alt' => 'icone cryptomonnais', 'style' => 'height:100px', 'class' => 'img-thumbnail']); ?>
                </div>
                <div class="px-3" style="margin: auto;">
                    <h2 class="h2 text-center">Les Crypto</h2>
                    <p>Monnaies numériques basées sur la blockchain, comme le Bitcoin. Volatiles et risquées.</p>
                </div>
            </div>
        </a>

        <a class="text-decoration-none " href="<?= $this->Url->build(['controller'=> 'Articles', 'action' => 'danger']) ?>">
            <div class="slideFromTop grow p-3 bg-dark text-white rounded mt-4 p-3 col-12 col-md-11 d-flex align-items-center" style="justify-content: space-between;">
                <div>
                    <?= $this->Html->image('danger.gif', ['alt' => 'icone danger', 'style' => 'height:100px', 'class' => 'img-thumbnail']); ?>
                </div>
                <div class="px-3" style="margin: auto;">
                    <h2 class="h2 text-center">Les dangers</h2>
                    <p>volatilité, hacking, arnaques, bulles spéculatives, utilisation à des fins illicites, impact environnemental (mining).</p>
                </div>
            </div>
        </a>

        <a class="text-decoration-none " href="<?= $this->Url->build(['controller'=> 'Articles', 'action' => 'blockchain']) ?>">
            <div class="slideFromTop grow p-3 bg-dark text-white rounded mt-4 p-3 col-12 col-md-11 d-flex align-items-center" style="justify-content: space-between;">
                <div>
                    <?= $this->Html->image('blockchain.gif', ['alt' => 'blockchain', 'style' => 'height:100px', 'class' => 'img-thumbnail']); ?>
                </div>
                <div class="px-3" style="margin: auto;">
                    <h2 class="h2 text-center">Les blockchain</h2>
                    <p>technologie de stockage et de transmission d'informations, transparente, sécurisée et décentralisée.</p>
                </div>
            </div>
        </a>

        <div class="slideFromTop grow p-3 bg-dark text-white rounded mt-4 p-3 col-12 col-md-11 justify-content-between   align-items-center">
            <h2 class="h2 text-center" >Qui sommes-nous ?</h2>
        </div>
    </main>
    <?= $this->cell('Article') ?>
</div>

    <?= $this->element('footer')?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Add this line -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        if (<?php echo $this->getRequest()->getCookie('validation'); ?> == 0) {
            $('#cookieModal').modal('show');
        }

        $('#acceptCookies').click(function() {

            $('#cookieModal').modal('hide');
        });

        $('#disableCookies').click(function() {

            $('#cookieModal').modal('hide');
        });
    });
</script>
</body>
</html>


