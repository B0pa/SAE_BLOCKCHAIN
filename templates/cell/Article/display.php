<aside id="home-aside" class="slideFromTop">
    <div id="home-aside-conteneur-actu" >
        <h2 id="home-aside-actu-h2" class="grow" >
            <?= $this->Html->link(
                "Les actualités",
                ['controller'=> 'Actualities', 'action' => 'actuality'],
                [
                    'escapeTitle' => false
                ]
            ) ?>
        </h2>

        <div id="home-aside-actu-conteneur-video" >
            <h3 id="home-aside-actu-h3-video">Quelques liens de médias mis a jour régulièrement que nous trouvons intéressants</h3>
            <h4 id="home-aside-actu-h4-video" >La dernière vidéo de Hasheur :</h4>
            <iframe id="home-aside-actu-video"
                    src="https://www.youtube-nocookie.com/embed?listType=playlist&list=UULFhlTcWDE8gd4tsl_L727NrQ"
                    allowfullscreen>
            </iframe>
        </div>


        <?php
        /** @var \App\Model\Entity\Actuality[] $actus */
        foreach ($actus as $actu) :
            ?>
            <div class='home-aside-actus' >

                <h3 class="home-aside-actus-h3" ><?= $actu->title ?></h3>
                <?= $this->Html->image("upload/" . $actu->img, ['class' => 'home-aside-actus-img','alt' => 'image'])?>
                <a class="home-aside-actus-lien " href=<?= $actu->link?>><?= $actu->title ?></a>
                <p class="home-aside-actus-p"><?= $actu->content?></p>
            </div>
        <?php
        endforeach;
        ?>
    </div>



</aside>
