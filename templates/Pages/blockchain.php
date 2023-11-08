<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blockchain</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-secondary">
<?= $this->element('nav')?>
<main class="mt-5 pt-5 d-flex flex-column  min-vh-100">

    <?= $this->Html->image('blockchain.jpg', ['class' => 'rounded-circle mt-3 mx-auto','alt' => 'NFT image']); ?>

    <div class="p-5">
    <h1 class="text-justify text-center">La Blockchain Expliquée en Termes Simples : Le Jeu de Confiance Mondial</h1>
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
    </div>
    <div class="btn btn-dark align-self-end me-5 col-1" >
        <a href="/pages/quizzBlockchain" class="text-white text-decoration-none" >Quiz</a>
    </div>
</main>

<?= $this->element('footer')?>

</body>
</html>
