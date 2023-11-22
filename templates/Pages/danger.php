<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danger</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css" />
</head>
<body class="bg-secondary">
<?= $this->element('nav')?>
<main  class="mt-5 pt-5 d-flex flex-column min-vh-100">

    <?= $this->Html->image('danger.png', ['class' => 'rounded-circle mt-3 mx-auto','alt' => 'NFT image']); ?>

    <div class="p-5">
        <h1 class="text-justify text-center">Les Dangers Potentiels de la Blockchain </h1>
        <p class="text-justify text-center fs-4" >
            Imagine un gigantesque cahier en ligne que tout le monde peut voir et sur lequel tout le monde peut écrire, mais personne ne peut tricher ! C'est comme un jeu mondial de confiance.La blockchain est une technologie révolutionnaire, mais elle n'est pas exempte de dangers. Comprendre ces risques est essentiel pour une utilisation responsable et éclairée de la blockchain. Voici un aperçu des principaux dangers à prendre en compte :</p>
        <h2 class="text-justify text-center">Sécurité</h2>
        <p class="text-justify text-center fs-4" >Bien que la blockchain soit réputée pour sa sécurité, elle n'est pas invulnérable. Les attaques de piratage peuvent cibler les plateformes d'échanges de cryptomonnaies, les portefeuilles numériques, ou même des vulnérabilités dans les contrats intelligents. Il est essentiel de prendre des mesures de sécurité appropriées pour protéger vos actifs numériques.</p>
        <h2 class="text-justify text-center">Volatilité</h2>
        <p class="text-justify text-center fs-4" >Les cryptomonnaies, qui reposent sur la blockchain, sont connues pour leur volatilité. Les prix peuvent fluctuer de manière significative en très peu de temps. Les investisseurs doivent être prudents et bien informés avant de s'engager sur le marché des cryptomonnaies.</p>
        <h2 class="text-justify text-center">Réglementation</h2>
        <p class="text-justify text-center fs-4" >Les gouvernements du monde entier commencent à réglementer les cryptomonnaies et la blockchain. Les lois et règlements varient d'un pays à l'autre, ce qui peut entraîner des défis en matière de conformité et de fiscalité. Il est essentiel de se conformer aux lois locales et de rester au courant des évolutions réglementaires.</p>
        <h2 class="text-justify text-center">Environnement</h2>
        <p class="text-justify text-center fs-4" >Le minage de certaines cryptomonnaies, comme le Bitcoin, a un impact environnemental significatif en raison de la consommation d'énergie élevée. Cette question soulève des préoccupations concernant la durabilité et l'empreinte carbone de la technologie blockchain.</p>
        <h2 class="text-justify text-center">Anonymat</h2>
        <p class="text-justify text-center fs-4" >Bien que l'anonymat puisse être un avantage, il peut également être exploité à des fins illégales, telles que le blanchiment d'argent et le financement du terrorisme. Les régulateurs cherchent à renforcer la lutte contre ces activités illicites.</p>
        <p class="text-justify text-center fs-4" >En somme, la blockchain offre de nombreux avantages, mais il est crucial de reconnaître et de comprendre les dangers qui y sont associés. La prudence, la sensibilisation et l'éducation sont essentielles pour naviguer en toute sécurité dans ce domaine en constante évolution.</p>

    </div>

    <div class="btn btn-dark align-self-end me-5 col-1" >
        <a href="/pages/quizzDanger"  class="text-white text-decoration-none" >Quiz</a>
    </div>
</main>

<?= $this->element('footer')?>

</body>
</html>
