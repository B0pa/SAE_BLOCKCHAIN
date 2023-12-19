
<body class="bg-secondary" >
<?= $this->element('nav')?>
<main class="pt-5 mt-5" >
    <?= $this->Html->image('NFT.png', ['class' => 'd-flex rounded-circle mt-3 mx-auto spin slideFromTop','alt' => 'NFT image']); ?>
    <?php
    /** @var \App\Model\Entity\Article[] $articles1 */
    foreach ($articles1 as $article) :
        ?>
        <div class='d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3' >
            <p class="d-flex p-2 col-10 mx-auto" ><?= $article->level?></p>
            <h2 class="h2 text-center mt-1 p-2" ><?= $article->title ?></h2>
            <p class="d-flex p-2 col-10 mx-auto" style="text-align: justify;" ><?= nl2br($article->content)?></p>
            <?= $this->Html->image("upload/" . $article->image, ['class' => 'd-flex img-fluid w-75 mx-auto rounded-3 mt-2 mb-3','alt' => 'accueil','style' => ''])?>
        </div>
    <?php
    endforeach;
    ?>

    <?php
    /** @var \App\Model\Entity\Article[] $articles2 */
    foreach ($articles2 as $article) :
        ?>
        <div class='d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3' >
            <p class="d-flex p-2 col-10 mx-auto" ><?= $article->level?></p>
            <h2 class="h2 text-center mt-1 p-2" ><?= $article->title ?></h2>
            <pre class="d-flex p-2 col-10 mx-auto" style="text-align: justify;" ><?= nl2br($article->content)?></pre>
            <?= $this->Html->image("upload/" . $article->image, ['class' => 'd-flex img-fluid w-75 mx-auto rounded-3 mt-2 mb-3','alt' => 'accueil','style' => ''])?>
        </div>
    <?php
    endforeach;
    ?>
    <?php
    /** @var \App\Model\Entity\Article[] $articles3 */
    foreach ($articles3 as $article) :
        ?>
        <div class='d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3' >
            <p class="d-flex p-2 col-10 mx-auto" ><?= $article->level?></p>
            <h2 class="h2 text-center mt-1 p-2" ><?= $article->title ?></h2>
            <pre class="d-flex p-2 col-10 mx-auto" style="text-align: justify;" ><?= nl2br($article->content)?></pre>
            <?= $this->Html->image("upload/" . $article->image, ['class' => 'd-flex img-fluid w-75 mx-auto rounded-3 mt-2 mb-3','alt' => 'accueil','style' => ''])?>
        </div>
    <?php
    endforeach;
    ?>

    <div class="p-5">
        <h2 class="text-justify text-center">Les NFT Expliqués Facilement : Des Objets Numériques Uniques</h2>
        <p class="text-justify text-center" >
            Imaginez que vous puissiez posséder une œuvre d'art numérique comme si c'était une peinture ou une sculpture réelle,
            et que tout le monde sache que c'est à vous, même si c'est sur un écran d'ordinateur.
            C'est ce que sont les NFT !</p>
        <h3 class="text-justify text-center">Les NFT, C'est Quoi ?</h3>
        <p class="text-justify text-center" >NFT signifie "Non-Fungible Token," ce qui est un terme compliqué pour quelque chose de simple.
            C'est comme avoir un certificat pour quelque chose d'unique, que ce soit une vidéo, une image, un morceau de musique, ou même un tweet.</p>
        <h3 class="text-justify text-center">La Magie de l'Unicité</h3>
        <p class="text-justify text-center" >La chose cool avec les NFT, c'est qu'ils sont uniques.
            Vous ne pouvez pas simplement les enregistrer, les copier et les coller comme une photo sur Internet.
            Chaque NFT possède un certificat qui l'authentifie, c'est comme avoir un objet de collection.</p>
        <h3 class="text-justify text-center">Comment ça Marche ?</h3>
        <p class="text-justify text-center" >Quand un artiste crée un NFT, il le met sur une blockchain, un peu comme un musée numérique.
            Cette blockchain garantit que l'objet numérique est authentique et unique.
            Une fois que quelqu'un achète un NFT, il devient le propriétaire et la blockchain garde une trace de qui possède quoi.</p>
        <h3 class="text-justify text-center">Pourquoi c'est Génial ?</h3>
        <p class="text-justify text-center" >Les NFT ont ouvert un tout nouveau monde pour les artistes et les créateurs.
            Ils peuvent vendre leurs œuvres directement aux fans, sans intermédiaires, et les fans peuvent montrer au monde entier qu'ils possèdent l'original.</p>
        <h3 class="text-justify text-center">Applications Créatives</h3>
        <p class="text-justify text-center" >Les NFT ne sont pas seulement pour l'art. Ils peuvent également être utilisés pour certains jeux vidéo, différents méta verses et bien plus encore.
            Cela signifie que les créateurs peuvent enfin être récompensés pour leur travail, et les collectionneurs peuvent exposer leurs trésors numériques.</p>
        <p class="text-justify text-center" >En résumé, les NFT sont comme des certificats qui prouvent que vous possédez quelque chose de vraiment unique sur Internet.
            Ils ouvrent de nouvelles possibilités passionnantes pour les artistes et les collectionneurs, et c'est une tendance passionnante à suivre dans le monde numérique.</p>
    </div>

    <div class="d-flex btn btn-warning text-white ms-auto justify-content-center me-5 mb-5 text-decoration-none text-center text-white col-1" >
        <?= $this->Html->link(
            "Quizz",
            ['controller'=> 'Quiz', 'action' => 'quizz_n_f_t'],
            [
                'class' => 'nav-link d-flex align-items-center text-decoration-none text-center text-dark',
                'escapeTitle' => false
            ]
        ) ?>
    </div>

</main>
</body>
