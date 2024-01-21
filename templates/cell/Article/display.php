<aside class="slideFromTop home-aside overflow-auto  text-white bg-dark rounded col-0 col-md-4 p-3 mt-4 border border-4 border-dark" style="max-height: 100%; ">
    <div class="text-center" >
        <h4>
            <?= $this->Html->link(
                "Les actualités",
                ['controller'=> 'Actualities', 'action' => 'actuality'],
                [
                    'class' => 'text-white fs-5 text-decoration-none btn btn-secondary align-self-end',
                    'escapeTitle' => false
                ]
            ) ?>
        </h4>

    </div>
    <div class="bg-secondary rounded-2 p-2" >
        <h3 class="h3 text-center">Quelques liens de médias mis a jour régulièrement que nous trouvons intéressants</h3>
        <p class="text-center" >La dernière vidéo de Hasheur:</p>
        <iframe
            src="https://www.youtube-nocookie.com/embed?listType=playlist&list=UULFhlTcWDE8gd4tsl_L727NrQ"
            width="100%"
            height="240"
            allowfullscreen>
        </iframe>
    </div>


    <?php
    /** @var \App\Model\Entity\Actuality[] $actus */
    foreach ($actus as $actu) :
        ?>
        <div class='my-2 bg-secondary rounded-2 p-2' >

            <h3 class="h2 text-center mt-1 p-2" ><?= $actu->title ?></h3>
            <?= $this->Html->image("upload/" . $actu->img, ['class' => 'd-flex img-fluid w-75 mx-auto rounded-3 mt-2 mb-3','alt' => 'image','style' => ''])?>
            <a class="text-warning text-center " href=<?= $actu->link?>><?= $actu->title ?></a>
            <p class="d-flex p-2 col-10 mx-auto" style="text-align: justify;" ><?= $actu->content?></p>
        </div>
    <?php
    endforeach;
    ?>


</aside>
