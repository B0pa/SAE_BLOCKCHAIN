<?php // use log;
use Cake\Log\Log; ?>
<?= $this->element('nav')?>
<div class="d-flex flex-column flex-md-row mx-1 mt-5 pt-5 mx-md-5 " style="margin-top:60px" >
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


        <a class="text-decoration-none d-flex slideFromTop grow p-3 bg-dark text-white rounded mt-4 p-3 col-12 col-md-11 align-items-center" style="justify-content: space-between;" href="<?= $this->Url->build(['controller'=> 'Articles', 'action' => 'nft']) ?>">
            <div>
                <?= $this->Html->image('NFT.gif', ['alt' => 'icone NFT', 'style' => 'height:100px' , 'class' => 'img-thumbnail img-fluid']); ?>
            </div>
            <div class="px-3" style="margin: auto;">
                <h2 class="h2 text-center">Les NFT</h2>
                <p>Jetons numériques uniques représentant un objet virtuel. Spéculatifs et sujets aux arnaques.</p>
            </div>
        </a>

        <a class="text-decoration-none slideFromTop grow p-3 bg-dark text-white rounded mt-4 p-3 col-12 col-md-11 d-flex align-items-center" style="justify-content: space-between;" href="<?= $this->Url->build(['controller'=> 'Articles', 'action' => 'crypto']) ?>">
            <div>
                <?= $this->Html->image('crypto.gif', ['alt' => 'icone cryptomonnais', 'style' => 'height:100px', 'class' => 'img-thumbnail']); ?>
            </div>
            <div class="px-3" style="margin: auto;">
                <h2 class="h2 text-center">Les Crypto</h2>
                <p>Monnaies numériques basées sur la blockchain, comme le Bitcoin. Volatiles et risquées.</p>
            </div>
        </a>

        <a class="text-decoration-none slideFromTop grow p-3 bg-dark text-white rounded mt-4 p-3 col-12 col-md-11 d-flex align-items-center" style="justify-content: space-between;" href="<?= $this->Url->build(['controller'=> 'Articles', 'action' => 'danger']) ?>">
            <div>
                <?= $this->Html->image('danger.gif', ['alt' => 'icone danger', 'style' => 'height:100px', 'class' => 'img-thumbnail']); ?>
            </div>
            <div class="px-3" style="margin: auto;">
                <h2 class="h2 text-center">Les dangers</h2>
                <p>volatilité, hacking, arnaques, bulles spéculatives, utilisation à des fins illicites, impact environnemental (mining).</p>
            </div>
        </a>

        <a class="text-decoration-none slideFromTop grow p-3 bg-dark text-white rounded mt-4 p-3 col-12 col-md-11 d-flex align-items-center" style="justify-content: space-between;" href="<?= $this->Url->build(['controller'=> 'Articles', 'action' => 'blockchain']) ?>">
            <div>
                <?= $this->Html->image('blockchain.gif', ['alt' => 'blockchain', 'style' => 'height:100px', 'class' => 'img-thumbnail']); ?>
            </div>
            <div class="px-3" style="margin: auto;">
                <h2 class="h2 text-center">Les blockchain</h2>
                <p>technologie de stockage et de transmission d'informations, transparente, sécurisée et décentralisée.</p>
            </div>
        </a>

        <div class="slideFromTop grow p-3 bg-dark text-white rounded mt-4 p-3 col-12 col-md-11 justify-content-between   align-items-center">
            <h2 class="h2 text-center" >Qui sommes-nous ?</h2>
        </div>
    </main>
    <?= $this->cell('Article') ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
