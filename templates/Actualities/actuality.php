<main id="actuality-main" class="navmarge">

    <?= $this->element('cookie_popup')?>

    <div id="actuality-main-conteneur" >
        <div class="actualite-conteneur-articles" >
            <h3 class="actualite-titre-articles">Quelques liens de médias mis a jour régulièrement que nous trouvons intéressants</h3>
            <p class="actualite-texte-articles" >La dernière vidéo de Hasheur:</p>

            <div class="actuality-conteneur-iframe" >
                <iframe
                    src="https://www.youtube-nocookie.com/embed?listType=playlist&list=UULFhlTcWDE8gd4tsl_L727NrQ"
                    height="560"
                    width="315"
                    allowfullscreen class="actualite-img-articles">
                </iframe>
            </div>
        </div>
        <?php
        /** @var \App\Model\Entity\Actuality[] $actus */
        foreach ($actus as $actu) :
            ?>
            <div class='actualite-conteneur-articles' >

                <h2 class="actualite-titre-articles" ><?= $actu->title ?></h2>
                <div class="actuality-conteneur-iframe" >
                    <?= $this->Html->image("upload/" . $actu->img, ['class' => 'actualite-img-articles','alt' => 'image','style' => ''])?>
                </div>
                <p class="actualite-texte-articles" ><?= $actu->content?></p>
                <p class="actualite-lien-articles">
                    <?= $this->Html->link(
                        $actu->title, // The text to be displayed as the link
                        $actu->link// The URL where the link should redirect to
                    ); ?>
                </p>

            </div>
        <?php
        endforeach;
        ?>
    </div>
    
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
