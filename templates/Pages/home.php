<?php // use log;
use Cake\Log\Log; ?>
<?= $this->element('nav')?>
<div id="home-conteneur" class="navmarge">
    <div id="home-contenu-main-aside" >
        <main id="home-main" >

            <?= $this->element('cookie_popup')?>

            <!-- ------------ -->

            <div id="home-conteneur-h1" class="slideFromTop" >
                <h1 id="home-h1" >Découvrer le fonctionnement de la <span>blockchain</span></h1>
            </div>

            <div id="home-conteneur-card" >
                <a class="home-card-categories slideFromTop grow" href="<?= $this->Url->build(['controller'=> 'Articles', 'action' => 'blockchain']) ?>">
                    <?= $this->Html->image('blockchain.gif', ['alt' => 'icone blockchain', 'class' => 'home-card-categories-img']); ?>
                    <div class="home-card-categories-text">
                        <h2>Les blockchains</h2>
                        <p>Technologie de stockage et de transmission d'informations, transparente, sécurisée et décentralisée.</p>
                    </div>
                </a>

                <a class="home-card-categories slideFromTop grow" href="<?= $this->Url->build(['controller'=> 'Articles', 'action' => 'nft']) ?>">
                    <?= $this->Html->image('NFT.gif', ['alt' => 'icone NFT', 'class' => 'home-card-categories-img']); ?>
                    <div class="home-card-categories-text">
                        <h2>Les NFTs</h2>
                        <p>Jetons numériques uniques représentant un objet virtuel. Spéculatifs et sujets aux arnaques.</p>
                    </div>
                </a>

                <a class="home-card-categories slideFromTop grow" href="<?= $this->Url->build(['controller'=> 'Articles', 'action' => 'crypto']) ?>">
                    <?= $this->Html->image('crypto.gif', ['alt' => 'icone cryptomonnais','class' => 'home-card-categories-img']); ?>
                    <div class="home-card-categories-text">
                        <h2>Les Cryptommonaies</h2>
                        <p>Monnaies numériques basées sur la blockchain, comme le Bitcoin. Volatiles et risquées.</p>
                    </div>
                </a>

                <a class="home-card-categories slideFromTop grow" href="<?= $this->Url->build(['controller'=> 'Articles', 'action' => 'danger']) ?>">
                    <?= $this->Html->image('danger.gif', ['alt' => 'icone danger','class' => 'home-card-categories-img']); ?>
                    <div class="home-card-categories-text">
                        <h2>Les dangers</h2>
                        <p>Volatilité, hacking, arnaques, bulles spéculatives, utilisation à des fins illicites, impact environnemental (mining).</p>
                    </div>
                </a>
            </div>


        </main>
        <?= $this->cell('Article') ?>
    </div>
    <div id="home-aside-whoarewe-conteneur"  class="slideFromTop">
        <div id="home-aside-whoarewe-inner">
            <div id="home-aside-whoarewe-front">
                <h2 id="home-aside-whoarewe-h2" >Qui sommes-nous ?</h2>
            </div>
            <div id="home-aside-whoarewe-back">
                <p id="home-aside-whoarewe-p" >Nous sommes une équipe de 4 étudiants en
                    informatique à l'IUT Lyon 1 site de Bourg-en-Bresse.
                    Nous avons créé ce site dans le cadre d'un projet.
                    Nous avons choisi le sujet de la blockchain car
                    c'est un sujet qui nous intéresse et qui est d'actualité.
                    Nous avons voulu créer un site qui permettrait à des personnes
                    qui ne connaissent pas la blockchain de découvrir
                    ce qu'est cette technologie et comment elle fonctionne.
                    Nous avons également voulu parler des dangers de la blockchain
                    car c'est un sujet qui est souvent mis de côté.</p>
            </div>
        </div>
    </div>

</div>
<?=$this->element('footer')?>


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


