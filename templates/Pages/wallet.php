<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wallet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="bg-secondary" >
<header>
    <?= $this->element('nav2')?>
</header>
<main class="mt-5 pt-5 justify-content-around d-md-flex col-sm- min-vh-100" >


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
                    <?php echo $this->Form->create(null, ['url' => ['controller' => 'Pages','action' => 'cookieAccept']]) ;?>
                    <?= $this->Form->button(__('Accept'), ['class' => 'btn btn-warning text-white rounded-3 slideFromTop ']) ?>
                    <?= $this->Form->end() ?>
                    <?php echo $this->Form->create(null, ['url' => ['controller' => 'Pages','action' => 'cookieRefuse']]) ;?>
                    <?= $this->Form->button(__('Refuse'), ['class' => 'btn btn-secondary bg-dark text-white rounded-3 slideFromTop ']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>


    <div class="mt-3 d-flex align-items-center d-md-block" >
        <?= $this->Html->image('cryptobitcoin.png', ['class' => 'rounded-circle','alt' => 'crypto Bitcoin']); ?>
        <p class="justify-content-center ms-4 ms-md-0 text-md-center mt-md-2" ><?php echo $this->getRequest()->getCookie('crypto'); ?></p>
        <?php
        $counter = 1;

        if ($counter == 0) {
            $imagePathCrypto = '';
        } else {
            $imagePathCrypto = 'cryptoreward.png';
            echo $this->Html->image($imagePathCrypto, ['class' => 'd-flex mt-3 mx-auto imageCliquable', 'style' => 'height:100px', 'alt' => 'Recompense']);
        }
        ?>
    </div>
    <div class="mt-3 d-flex align-items-center d-md-block" >
        <?= $this->Html->image('cryptoblockchain.png', ['class' => 'rounded-circle ','alt' => 'crypto Blockchain']); ?>
        <p class="justify-content-center ms-4 ms-md-0 text-md-center mt-md-2"><?php echo $this->getRequest()->getCookie('blockchain'); ?></p>
        <?php
        $counter = $this->getRequest()->getCookie('blockchain');

        if ($counter == 0) {
            $imagePathBlockchain = 'blockchain1.jpg';
        } else {
            $imagePathBlockchain = 'blockchain2.jpg';
        }
        ?>
        <?php echo $this->Html->image($imagePathBlockchain, ['class' => 'd-flex mt-3 mx-auto imageCliquable', 'style' => 'height:300px', 'alt' => 'Recompense']); ?>
    </div>
    <div class="mt-3 d-flex align-items-center d-md-block" >
        <?= $this->Html->image('cryptodanger.png', ['class' => 'rounded-circle','alt' => 'crypto Danger']); ?>
        <p class="justify-content-center ms-4  ms-md-0 text-md-center mt-md-2"><?php echo $this->getRequest()->getCookie('danger'); ?></p>
        <?php
        $counter = 1;

        if ($counter == 0) {
            $imagePathDanger = '';
        } else {
            $imagePathDanger = 'certificat.png';
            echo $this->Html->image($imagePathDanger, ['class' => 'd-flex mt-3 mx-auto imageCliquable', 'style' => 'height:300px', 'alt' => 'Recompense']);
        }
        ?>
    </div>
    <div class="mt-3 d-flex align-items-center d-md-block" >
        <?= $this->Html->image('cryptoNFT.png', ['class' => 'rounded-circle','alt' => 'crypto NFT']); ?>
        <p class="justify-content-center ms-4 ms-md-0 text-md-center mt-md-2"><?php echo $this->getRequest()->getCookie('nft'); ?></p>
    </div>
    <?php
    // $counter = $this->getRequest()->getCookie('nft');
    $counter = 1;
    if ($counter == 0) {
        $linkPathNft = 'home';
    } else {
        $linkPathNft = 'rewardquiz';
    }
    ?>
    <?= $this->Html->link(
        "Votre récompense, si vous en êtes digne",
        ['controller'=> 'Pages', 'action' => $linkPathNft],
        [
            'class' => 'text-white text-decoration-none btn btn-secondary',
            'escapeTitle' => false
        ]
    ) ?>
</main>
<?= $this->element('footer')?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Ajouter un gestionnaire d'événements au clic de l'image
        $('.imageCliquable').click(function() {
            // Ouvrir l'image en grand ou dans un nouvel onglet
            window.open($(this).attr('src'), '_blank');
        });
    });
</script>

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
