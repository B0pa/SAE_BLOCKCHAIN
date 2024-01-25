

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wallet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="bg-secondary" >
<header>
    <?= $this->element('nav2')?>
</header>
<main class="pt-5 mt-5 d-flex flex-column flex-md-row" style="min-height: 100vh; " >
    <div class="mt-3 align-items-center d-md-block col col-pousse overflow-hidden border-start border-end border-1 border-dark " >
        <?= $this->Html->image('cryptobitcoin.png', ['class' => 'd-flex rounded-circle mx-auto','alt' => 'crypto Bitcoin']); ?>
        <p class="justify-content-center text-center mt-2" ><?php echo $this->getRequest()->getCookie('crypto'); ?></p>
        <?php
        $counter = $this->getRequest()->getCookie('crypto');
        if ($counter < 500) {
            $imagePathCrypto = 'cryptoreward.png';
            echo $this->Html->image($imagePathCrypto, ['class' => 'd-flex mt-3 mx-auto imageCliquable', 'style' => 'height:300px', 'alt' => 'Recompense']);
        } else if ($counter == 500) {
            ?>
            <input type="file" id="imageInput" accept="image/*" onchange="processImage(event)" class='form-control w-75 mx-auto rounded-3 mt-2 mb-3' alt='accueil'>
            <input type="text" id="letterInput" placeholder="Enter a letter" class = 'form-control bg-secondary  w-75 mx-auto '>
            <?= $this->Form->button('Soumettre', ['id' => 'submitButton', 'class' => 'btn btn-dark text-white d-flex rounded-3 slideFromTop mx-auto  mt-2 mb-3 ']) ?>
            <canvas id="outputCanvas" width="300" height="300" style="border-radius: 50%;" class="d-flex mx-auto" ></canvas>
            <?php
        }?>

    </div>
    <div class="mt-3 align-items-center d-md-block col col-pousse overflow-hidden border-start border-end border-1 border-dark " >
        <?= $this->Html->image('cryptoblockchain.png', ['class' => 'd-flex rounded-circle mx-auto','alt' => 'crypto Blockchain']); ?>
        <p class="justify-content-center text-center mt-2"><?php echo $this->getRequest()->getCookie('blockchain'); ?></p>
        <?php
        $imagePathBlockchain = '';
        $counter = $this->getRequest()->getCookie('blockchain');

        if ($counter == 0 && $counter < 100) {
            $imagePathBlockchain = 'blockchain1.jpg';
        } else if ($counter >= 100 && $counter < 300){
            $imagePathBlockchain = 'blockchain2.jpg';
        } else if ($counter >= 300 && $counter < 500){
            $imagePathBlockchain = 'blockchain3.jpg';
        } else if ($counter == 500){
            $imagePathBlockchain = 'blockchain4.jpg';
        }
        ?>
        <?php echo $this->Html->image($imagePathBlockchain, ['class' => 'd-flex mt-3 mx-auto imageCliquable rounded-3 w-25', 'style' => '', 'alt' => 'Recompense']); ?>
    </div>
    <div class="mt-3 align-items-center d-md-block col col-pousse overflow-hidden border-start border-end border-1 border-dark " >

        <?= $this->Html->image('cryptodanger.png', ['class' => 'd-flex rounded-circle mx-auto','alt' => 'crypto Danger']); ?>
        <p class="justify-content-center text-center mt-2"><?php echo $this->getRequest()->getCookie('danger'); ?></p>
        <?php
        $counter =  $this->getRequest()->getCookie('danger');

        if ($counter == 0) {
            $imagePathDanger = '';
        } else if ($counter == 500) {
            $imagePathDanger = 'certificat.png';
            echo $this->Html->image($imagePathDanger, ['class' => 'd-flex mt-3 mx-auto w-50 imageCliquable', 'style' => '', 'alt' => 'Recompense']);
        }
        ?>
    </div>
    <div class="mt-3 align-items-center d-md-block col col-pousse overflow-hidden border-start border-end border-1 border-dark " >
        <?= $this->Html->image('cryptoNFT.png', ['class' => 'd-flex rounded-circle mx-auto','alt' => 'crypto NFT']); ?>
        <p class="text-center mt-2"><?php echo $this->getRequest()->getCookie('nft'); ?></p>
        <?php // Gérer l'affichage du formulaire en fonction du nombre de cookies
        $counter = $this->getRequest()->getCookie('nft'); ?>

        <?= $this->Form->create(null, ['url' => ['controller' => 'Pages', 'action' => 'wallet']]) ?>

        <?php if ($counter > 0 && $counter <= 500) { ?>

            <div class="d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3 slideFromTop overflow-hidden" >
                <h2 class="text-center" >Questionnaire</h2>
                <p class="justify-content-center ms-4 ms-md-0 text-md-center mt-md-2">Vous vous considerez plutot comme: </p>
                <?= $this->Form->radio('question_1', ['Ser' => 'Sérieux', 'Opt' => 'Optimiste', 'Far' => 'Farceur']) ?>
            </div>

        <?php }
        if ($counter > 200 && $counter <= 500) { ?>

            <div class="d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3 slideFromTop" >
                <p class="justify-content-center ms-4 ms-md-0 text-md-center mt-md-2">Vous vous considerez plutot comme: </p>
                <?= $this->Form->radio('question_2', ['Ori' => 'Original', 'Sob' => 'Sobre', 'Lib' => 'Libre']) ?>
            </div>


        <?php } if ($counter == 500 ) {?>

            <div class="d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3 slideFromTop" >
                <p class="justify-content-center ms-4 ms-md-0 text-md-center mt-md-2">Votre couleur préférée dans cette liste: </p>
                <?= $this->Form->radio('question_3', ['Rou' => 'Rouge', 'Ble' => 'Bleu', 'Ver' => 'Vert']) ?>
            </div>

        <?php } else {
            $linkPathNft = 'home';
        }
        ?>

        <?php if ($counter > 0) { ?>
            <?= $this->Form->button('Soumettre', [ 'class' => 'btn btn-dark text-white d-flex rounded-3 slideFromTop mx-auto  mt-2 mb-3 ']) ?>
        <?php } ?>

        <?php if ($imageName) : ?>
            <h2 class="text-center overflow-hidden" >Votre Image Personnalisée</h2>
            <?= $this->Html->image($imageName, ['alt' => 'Image personnalisée','class'=>'d-flex mt-3 mx-auto w-75 rounded-3 imageCliquable']) ?>
        <?php endif; ?>

        <?= $this->Form->end() ?>
    </div>

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

    function processImage(event) {
        const input =  document.getElementById('imageInput');
        const canvas = document.getElementById('outputCanvas');
        const context = canvas.getContext('2d');

        const file = input.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const img = new Image();
            img.onload = function() {
                // Clear the canvas
                context.clearRect(0, 0, canvas.width, canvas.height);

                // Draw the image on the canvas
                context.drawImage(img, 0, 0, canvas.width, canvas.height);

                // Get the letter from the input field
                const letter = document.getElementById('letterInput').value.toUpperCase();

                // Add the letter at the center of the canvas
                context.font = 'bold 40px Arial';
                context.fillStyle = 'white';
                context.textAlign = 'center';
                context.textBaseline = 'middle';
                context.fillText(letter, canvas.width / 2, canvas.height / 2);

                // Clip the canvas to create a round shape
                context.globalCompositeOperation = 'destination-in';
                context.beginPath();
                context.arc(canvas.width / 2, canvas.height / 2, canvas.width / 2, 0, 2 * Math.PI);
                context.fill();
                context.globalCompositeOperation = 'source-over';
            };

            img.src = e.target.result;
        };

        reader.readAsDataURL(file);
    };

    $('.col-pousse').hover(
        function() {
            $(this).addClass('col-9').removeClass('col');
            $(this).siblings().addClass('col-1').removeClass('col');
        },
        function() {
            $(this).addClass('col').removeClass('col-9');
            $(this).siblings().addClass('col').removeClass('col-1');
        }
    );
    // Add an event listener to the 'Soumettre' button
    document.getElementById('submitButton').addEventListener('click', function() {
        // Call the processImage function when the button is clicked
        processImage();
    });
</script>
</body>
</html>
