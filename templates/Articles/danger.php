

<?= $this->Html->image('danger.png', ['class' => 'rounded-circle mt-3 mx-auto','alt' => 'NFT image']); ?>
<?php
/** @var \App\Model\Entity\Article[] $articles */
foreach ($articles as $article) :
    ?>
    <p><?= $article->level?></p>
    <h2><?= $article->title ?></h2>
    <p><?= $article->content?></p>
    <?= $this->Html->image("upload/" . $article->image)?>

<?php
endforeach;
?>
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
<?= $this->Html->link(
    "Quizz",
    ['controller'=> 'Quiz', 'action' => 'quizz_danger'],
    [
        'class' => 'nav-link d-flex align-items-center',
        'escapeTitle' => false
    ]
) ?>
