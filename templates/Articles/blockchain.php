<body class="bg-secondary" >
<?= $this->element('nav')?>
<main class="pt-5 mt-5" >
    <?= $this->Html->image('blockchain.jpg', ['class' => 'd-flex rounded-circle mt-3 mx-auto spin slideFromTop','alt' => 'NFT image']); ?>

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
            <p class="d-flex p-2 col-10 mx-auto" style="text-align: justify;" ><?= nl2br($article->content)?></p>
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
            <p class="d-flex p-2 col-10 mx-auto" style="text-align: justify;" ><?= nl2br($article->content)?></p>
            <?= $this->Html->image("upload/" . $article->image, ['class' => 'd-flex img-fluid w-75 mx-auto rounded-3 mt-2 mb-3','alt' => 'accueil','style' => ''])?>
        </div>
    <?php
    endforeach;
    ?>

    <div class="p-5">
        <h1 class="text-justify text-center">Niveau 1: La Blockchain Expliquée en Termes Simples : Le Jeu de Confiance Mondial</h1>
        <p class="text-justify text-center fs-4" >
            Imagine un gigantesque cahier en ligne que tout le monde peut voir et sur lequel tout le monde peut écrire, mais personne ne peut tricher ! C'est comme un jeu mondial de confiance.</p>
        <h2 class="text-justify text-center">Le Gros Cahier Mondial</h2>
        <p class="text-justify text-center fs-4" >La blockchain est ce cahier géant. Mais voici le truc qui change par rapport au système bancaire classique : au lieu d'être gardé par une seule personne, il est entre les mains de millions de personnes partout dans le monde. Chacun d'entre eux a une copie du cahier, et chacun vérifie ce qui est écrit dedans.</p>
        <h2 class="text-justify text-center">Des Transactions Transparentes</h2>
        <p class="text-justify text-center fs-4" >Quand quelqu'un veut faire une transaction, comme acheter quelque chose avec de l'argent numérique (comme le Bitcoin), tous les participants du jeu vérifient si la transaction est bonne. Une fois que tout le monde est d'accord que la transaction est valide, elle est ajoutée à une page du cahier.</p>
        <h2 class="text-justify text-center">La Magie de la Cryptographie</h2>
        <p class="text-justify text-center fs-4" >Chaque page est verrouillé grâce à de la magie mathématique appelée "cryptographie". Cela signifie que personne ne peut changer ce qui est écrit dedans une fois que c'est verrouillé, ce qui le rend super sécurisé.</p>
        <h2 class="text-justify text-center">Pourquoi c'est Cool ?</h2>
        <p class="text-justify text-center fs-4" >La blockchain rend les choses super sécurisées, transparentes, et résistantes à la triche. Personne ne peut le censurer non plus, c'est comme un jeu équitable pour tout le monde. C'est pourquoi la blockchain est utilisée pour plein de choses cool, comme les monnaies numériques, le suivi des produits depuis leur fabrication, ou même pour des contrats intelligents.</p>
        <p class="text-justify text-center fs-4" >En bref, la blockchain est un jeu mondial de confiance où tout le monde joue et personne ne peut tricher. </p>


        <!-- Il faut mettre des sauts de ligne (beaucoup)-->


        <h2 class="text-justify text-center">Niveau 2: Approfondissement des différents points</h2>
        <h2 class="text justify text-center">Cryptographie : Le Bouclier de la Blockchain Expliqué</h2>
        <p class="text-justify text-center fs-4" >
            Au cœur de la blockchain se trouve un bouclier puissant qui garantit la sécurité et l'intégrité des données : la cryptographie. La cryptographie est la science de la protection des informations en les transformant en un code secret, et c'est essentiel pour comprendre comment fonctionne la blockchain. Voici quelques éléments clés :</p>
        <p class="text-justify text-center fs-3" >- Hachage</p>
        <p class="text-justify text-center fs-4" >La blockchain utilise des fonctions de hachage, qui sont des algorithmes mathématiques qui prennent une entrée (comme une transaction) et la transforment en une chaîne de caractères de longueur fixe, généralement beaucoup plus courte. Le résultat, appelé "haché," est unique pour chaque entrée, ce qui signifie que même la plus petite modification de l'entrée produira un haché complètement différent. Cela garantit l'intégrité des données : si quelqu'un tente de falsifier une transaction, le haché ne correspondra plus à la transaction réelle, signalant ainsi une altération.</p>
        <p class="text-justify text-center fs-3" >- Signature Numérique</p>
        <p class="text-justify text-center fs-4" >Les transactions sur la blockchain sont également sécurisées à l'aide de signatures numériques. Chaque utilisateur possède une paire de clés : une clé privée et une clé publique. La clé privée est secrète et utilisée pour signer les transactions, tandis que la clé publique est partagée avec le réseau. Lorsqu'une transaction est créée, elle est signée numériquement avec la clé privée de l'expéditeur. Les autres participants du réseau peuvent utiliser la clé publique pour vérifier la signature et s'assurer que la transaction est authentique.</p>
        <p class="text-justify text-center fs-3" >- Résistance à la Cryptanalyse</p>
        <p class="text-justify text-center fs-4" >Les algorithmes de cryptographie utilisés dans la blockchain sont conçus pour résister aux attaques de cryptanalyse, qui consistent à essayer de casser le code en trouvant des faiblesses dans l'algorithme. La robustesse de ces algorithmes est essentielle pour garantir la sécurité à long terme de la blockchain.</p>
        <p class="text-justify text-center fs-3" >- Confidentialité</p>
        <p class="text-justify text-center fs-4" >La cryptographie permet également de préserver la confidentialité des transactions, malgré la transparence du grand livre. Les techniques telles que les adresses furtives et les contrats intelligents permettent de masquer les détails spécifiques des transactions tout en confirmant leur validité.</p>
        <p class="text-justify text-center fs-4" >La cryptographie est le bouclier invisible qui protège chaque transaction et chaque bloc sur la blockchain. Elle garantit que les données sont sécurisées, que les transactions sont authentiques et que l'intégrité du grand livre est maintenue. Comprendre les principes de la cryptographie est essentiel pour saisir la sécurité et la fiabilité de la blockchain.</p>

        <!-- Il faut mettre des sauts de ligne (moins que l'autre)-->

        <h2 class="text-justify text-center">Décentralisation : Le Pilier Fondateur de la Blockchain</h2>
        <p class="text-justify text-center fs-4" >La décentralisation est le principe clé qui distingue la blockchain des systèmes traditionnels. Elle révolutionne la manière dont les données sont gérées et partagées. Voici une exploration plus approfondie de ce pilier fondamental de la blockchain :</p>
        <p class="text-justify text-center fs-3" >- Absence d'Autorité Centrale </p>
        <p class="text-justify text-center fs-4" >Contrairement aux bases de données classiques qui sont généralement contrôlées par une seule entité (comme une banque ou un gouvernement), la blockchain fonctionne sur un réseau décentralisé de nœuds. Chaque nœud est un participant équipé d'une copie complète du grand livre, et aucune autorité centrale n'a le pouvoir de dicter les règles du réseau. Cela élimine les points de défaillance uniques et distribue le pouvoir à l'ensemble du réseau.</p>
        <p class="text-justify text-center fs-3" >- Résistance à la Censure </p>
        <p class="text-justify text-center fs-4" >La décentralisation confère à la blockchain une résistance intrinsèque à la censure. Aucune entité ne peut contrôler ou bloquer l'accès à la blockchain, car elle est dispersée sur de nombreux nœuds dans le monde entier. Cela garantit une plus grande liberté et accessibilité, en particulier dans des contextes où la censure est une préoccupation.</p>
        <p class="text-justify text-center fs-3" >- Mécanismes de Consensus Distribués </p>
        <p class="text-justify text-center fs-4" >Pour prendre des décisions sur l'ajout de nouvelles transactions à la blockchain, les réseaux décentralisés utilisent des mécanismes de consensus distribués. Des algorithmes tels que la preuve de travail (Proof of Work - PoW) ou la preuve d'enjeu (Proof of Stake - PoS) nécessitent que la majorité des nœuds soient d'accord pour valider une transaction. Cela empêche la domination d'une seule entité sur le réseau.</p>
        <p class="text-justify text-center fs-3" >- Résilience et Fiabilité </p>
        <p class="text-justify text-center fs-4" >La décentralisation renforce la résilience du réseau. Même en cas de défaillance ou de compromission d'un certain nombre de nœuds, le réseau global reste opérationnel. Cela confère une fiabilité accrue, car la blockchain peut continuer à fonctionner même en présence de défaillances locales.</p>
        <p class="text-justify text-center fs-3" >- Participation Active </p>
        <p class="text-justify text-center fs-4" >Chaque nœud dans le réseau a un rôle actif dans la validation des transactions et dans le maintien de l'intégrité de la blockchain. La décentralisation encourage la participation active des membres, ce qui contribue à la sécurité globale du système.</p>
        <p class="text-justify text-center fs-3" >- Évolutivité Horizontale </p>
        <p class="text-justify text-center fs-4" >La décentralisation permet une évolutivité horizontale, ce qui signifie que le réseau peut s'agrandir sans ajouter de complexité à chaque nœud individuel. Cela facilite la croissance du réseau sans sacrifier sa performance.</p>
        <p class="text-justify text-center fs-4" >En résumé, la décentralisation est bien plus qu'une simple caractéristique technique de la blockchain. C'est un changement fondamental de paradigme qui offre résistance, fiabilité et participation égale à tous les acteurs du réseau. C'est cette décentralisation qui donne à la blockchain son pouvoir de transformer la confiance et l'échange d'informations à l'échelle mondiale.</p>
    </div>

    <div class="d-flex btn btn-warning text-white ms-auto justify-content-center me-5 mb-5 text-decoration-none text-center text-white col-1" >
        <?= $this->Html->link(
            "Quizz",
            ['controller'=> 'Quiz', 'action' => 'quizz_blockchain'],
            [
                'class' => 'nav-link d-flex align-items-center text-decoration-none text-center text-dark',
                'escapeTitle' => false
            ]
        ) ?>


    </div>

</main>
</body>
