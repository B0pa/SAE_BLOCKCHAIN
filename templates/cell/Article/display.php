<aside class="slideFromTop home-aside flex-shrink-0 text-white bg-dark rounded col-0 col-md-4 p-3 mt-4">
    <div class="text-center" >
        <h2 class="h2">Les actualités</h2>
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
    dd($actus);
    ?>
    <?= $this->Html->link(
        "Actualité",
        ['controller'=> 'Pages', 'action' => 'actuality'],
        [
            'class' => 'text-white text-decoration-none btn btn-secondary align-self-end',
            'escapeTitle' => false
        ]
    ) ?>

</aside>
