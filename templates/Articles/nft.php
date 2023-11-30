<?php
/** @var \App\Model\Entity\Article[] $articles */
foreach ($articles as $article) :
    ?>
    <p><?= $article->level?></p>
    <h2><?= $article->title ?></h2>
    <p><?= $article->content?></p>
    <?= $this->Html->image($article->image)?>

<?php
endforeach;
?>

<?= $this->Html->image('NFT.png', ['class' => 'rounded-circle mt-3 mx-auto','alt' => 'NFT image']); ?>

<div class="p-5">
    <h1 class="text-justify text-center">Les NFT Expliqués Facilement : Des Objets Numériques Uniques</h1>
    <p class="text-justify text-center fs-4" >
        Imaginez que vous puissiez posséder une œuvre d'art numérique comme si c'était une peinture ou une sculpture réelle,
        et que tout le monde sache que c'est à vous, même si c'est sur un écran d'ordinateur.
        C'est ce que sont les NFT !</p>
    <h2 class="text-justify text-center">Les NFT, C'est Quoi ?</h2>
    <p class="text-justify text-center fs-4" >NFT signifie "Non-Fungible Token," ce qui est un terme compliqué pour quelque chose de simple.
        C'est comme avoir un certificat pour quelque chose d'unique, que ce soit une vidéo, une image, un morceau de musique, ou même un tweet.</p>
    <h2 class="text-justify text-center">La Magie de l'Unicité</h2>
    <p class="text-justify text-center fs-4" >La chose cool avec les NFT, c'est qu'ils sont uniques.
        Vous ne pouvez pas simplement les enregistrer, les copier et les coller comme une photo sur Internet.
        Chaque NFT possède un certificat qui l'authentifie, c'est comme avoir un objet de collection.</p>
    <h2 class="text-justify text-center">Comment ça Marche ?</h2>
    <p class="text-justify text-center fs-4" >Quand un artiste crée un NFT, il le met sur une blockchain, un peu comme un musée numérique.
        Cette blockchain garantit que l'objet numérique est authentique et unique.
        Une fois que quelqu'un achète un NFT, il devient le propriétaire et la blockchain garde une trace de qui possède quoi.</p>
    <h2 class="text-justify text-center">Pourquoi c'est Génial ?</h2>
    <p class="text-justify text-center fs-4" >Les NFT ont ouvert un tout nouveau monde pour les artistes et les créateurs.
        Ils peuvent vendre leurs œuvres directement aux fans, sans intermédiaires, et les fans peuvent montrer au monde entier qu'ils possèdent l'original.</p>
    <h2 class="text-justify text-center">Applications Créatives</h2>
    <p class="text-justify text-center fs-4" >Les NFT ne sont pas seulement pour l'art. Ils peuvent également être utilisés pour certains jeux vidéo, différents méta verses et bien plus encore.
        Cela signifie que les créateurs peuvent enfin être récompensés pour leur travail, et les collectionneurs peuvent exposer leurs trésors numériques.</p>
    <p class="text-justify text-center fs-4" >En résumé, les NFT sont comme des certificats qui prouvent que vous possédez quelque chose de vraiment unique sur Internet.
        Ils ouvrent de nouvelles possibilités passionnantes pour les artistes et les collectionneurs, et c'est une tendance passionnante à suivre dans le monde numérique.</p>
</div>

<div class="btn btn-dark align-self-end me-5 col-1" >
    <?= $this->Html->link(
        "Quizz",
        ['controller'=> 'Pages', 'action' => 'quizz_n_f_t'],
        [
            'class' => 'nav-link d-flex align-items-center',
            'escapeTitle' => false
        ]
    ) ?>


</div>
