<body class="bg-secondary" >
    <?= $this->element('nav')?>
    <main class="pt-5 mt-5" >   
        <?= $this->Html->image('crypto.png', ['class' => 'd-flex rounded-circle mt-3 mx-auto spin slideFromTop','alt' => 'NFT image']); ?>
    <?php
            /** @var \App\Model\Entity\Article[] $articles */
            foreach ($articles as $article) :
                ?>
                <div class='d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3' >
                    <p class="d-none p-2" ><?= $article->level?></p>
                    <h2 class="h2 text-center mt-1 p-2" ><?= $article->title ?></h2>
                    <p class="d-flex p-2 col-10 mx-auto" style="text-align: justify;" ><?= $article->content?></p>
                    <?= $this->Html->image("upload/" . $article->image, ['class' => 'd-flex img-fluid w-75 mx-auto rounded-3 mt-2 mb-3','alt' => 'accueil','style' => ''])?>

                </div>
            <?php
            endforeach;
            ?>


 
    <?php //= $userName ?><!-- -->

    <div class="p-5">
        <h1 class="text-justify text-center">Les Cryptomonnaies Expliquées en Termes Simples : La Magie de la Monnaie Numérique</h1>
        <p class="text-justify text-center fs-4" >
            Imaginez une monnaie que vous pouvez utiliser en ligne, sans pièces ni billets physiques. Les cryptomonnaies, c'est exactement ça, de l'argent numérique !</p>
        <h2 class="text-justify text-center">Qu'est-ce qu'une Cryptomonnaie ?</h2>
        <p class="text-justify text-center fs-4" >Les cryptomonnaies sont comme de l'argent numérique, mais avec une touche spéciale. Elles sont construites sur une technologie appelée blockchain (voir article blockchain), qui les rend très spéciales. La blockchain garantit que tout est sécurisé et transparent.</p>
        <h2 class="text-justify text-center">La Blockchain : Gardienne de l'Argent Numérique</h2>
        <p class="text-justify text-center fs-4" >La blockchain est un grand livre de compte électronique qui enregistre toutes les transactions. C'est comme un compte en banque géant qui n'est pas détenu par une seule banque, mais par tout le monde. Toutes les transactions sont enregistrées dans des "blocs" et sécurisées par une technologie de cryptographie.</p>
        <h2 class="text-justify text-center">Comment Utiliser les Cryptomonnaies ?</h2>
        <p class="text-justify text-center fs-4" >Pour utiliser des cryptomonnaies, vous avez besoin d'un portefeuille numérique. C'est comme un compte bancaire en ligne. Vous pouvez acheter des cryptomonnaies avec de l'argent réel et les stocker dans votre portefeuille. Ensuite, vous pouvez les utiliser pour acheter des biens et des services en ligne.</p>
        <h2 class="text-justify text-center">Pourquoi c'est Cool ?</h2>
        <p class="text-justify text-center fs-2" >Les cryptomonnaies sont cool pour plusieurs raisons :</p>
        <p class="text-justify text-center fs-3" >- Sécurité</p>
        <p class="text-justify text-center fs-4" >Grâce à la blockchain, les transactions sont super sécurisées et ne peuvent pas être modifiées.</p>
        <p class="text-justify text-center fs-3" >- Transparence</p>
        <p class="text-justify text-center fs-4" >Toutes les transactions sont visibles par tout le monde, ce qui rend le système transparent.</p>
        <p class="text-justify text-center fs-3" >- Liberté</p>
        <p class="text-justify text-center fs-4" >Vous avez un contrôle total sur votre argent, sans besoin d'une banque intermédiaire.</p>
        <p class="text-justify text-center fs-3" >- Rapidité</p>
        <p class="text-justify text-center fs-4" >Les transactions peuvent être beaucoup plus rapides que les méthodes traditionnelles d'envoi d'argent.</p>
        <h2 class="text-justify text-center">Les Nombreuses Cryptomonnaies</h2>
        <p class="text-justify text-center fs-4" >Il ne s'agit pas seulement du Bitcoin, il existe des milliers de cryptomonnaies différentes, chacune avec ses propres caractéristiques. Certaines sont conçues pour la vie quotidienne, d'autres pour des utilisations spécifiques comme les contrats intelligents.</p>
        <h2 class="text-justify text-center">Un Futur Monétaire Numérique</h2>
        <p class="text-justify text-center fs-4" >Les cryptomonnaies ont le potentiel de changer la façon dont nous gérons notre argent. Elles sont déjà utilisées pour des achats en ligne, des investissements, et même pour soutenir des projets artistiques. Le futur de l'argent pourrait bien être numérique.</p>
    </div>

    <div class="d-flex btn btn-warning text-white ms-auto justify-content-center me-5 mb-5 text-decoration-none text-center text-white col-1" >
        <?= $this->Html->link(
            "Quizz",
            ['controller'=> 'Quiz', 'action' => 'quizzcrypto'],
            [
                'class' => 'nav-link d-flex align-items-center text-decoration-none text-center text-dark',
                'escapeTitle' => false
            ]
        ) ?>
    </main>
</body>



