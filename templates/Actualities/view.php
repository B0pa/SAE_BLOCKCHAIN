<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actuality $actuality
 */
?>
<main id="actuality-main" class="navmarge">

    <?= $this->element('cookie_popup')?>


    <div class='actualite-conteneur-articles' >

        <h2 class="actualite-titre-articles" ><?= $actuality->title ?></h2>
        <div class="actuality-conteneur-iframe" >
            <?= $this->Html->image("upload/" . $actuality->img, ['class' => 'actualite-img-articles','alt' => 'image','style' => ''])?>
        </div>
        <p class="actualite-texte-articles" ><?= $actuality->content ?></p>
        <p class="actualite-lien-articles">
            <?= $this->Html->link(
                $actuality->title, // The text to be displayed as the link
                $actuality->link// The URL where the link should redirect to
            ); ?>
        </p>

    </div>
</main>
