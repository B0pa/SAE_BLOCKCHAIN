<body class="mt-5 pt-5 bg-secondary" >
<?= $this->element('nav2')?>
<main class="mt-5">
    <div>
        <div class="d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-5 rounded-3 slideFromTop" >
            <h3 class="h3 text-center">Quelques liens de médias mis a jour régulièrement que nous trouvons intéressants</h3>
            <p class="text-center" >La dernière vidéo de Hasheur:</p>
            <iframe
                src="https://www.youtube-nocookie.com/embed?listType=playlist&list=UULFhlTcWDE8gd4tsl_L727NrQ"
                width="75%"
                height="400"
                allowfullscreen class="mx-auto">
            </iframe>
        </div>
        <?php
        /** @var \App\Model\Entity\Actuality[] $actus */
        foreach ($actus as $actu) :
            ?>
            <div class='d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-5 rounded-3 slideFromTop' >

                <h2 class="h2 text-center mt-1 p-2" ><?= $actu->title ?></h2>
                <?= $this->Html->image("upload/" . $actu->img, ['class' => 'd-flex img-fluid w-75 mx-auto rounded-3 mt-2 mb-3','alt' => 'image','style' => ''])?>
                <a class="text-center" href=<?= $actu->link?>><?= $actu->title ?></a>
                <p class="d-flex p-2 col-10 mx-auto" style="text-align: justify;" ><?= $actu->content?></p>
            </div>
        <?php
        endforeach;
        ?>
    </div>
</main>
<?= $this->element('footer')?>
</body>


