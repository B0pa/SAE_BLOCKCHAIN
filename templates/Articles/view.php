
<main id="crypto-main" class="navmarge" >
    <?= $this->Html->link(
        'Aller à l\'accueil',
        ['controller'=> 'Pages', 'action' => 'home'],
        [
            'class' => 'btnyellow grow',
            'escapeTitle' => false
        ]
    ) ?>

    <?php
    /** @var \App\Model\Entity\Article $article */
    if ($article->css_title == null){
        $article->css_title = "h2 text-center mt-1 p-2";
    }
    if ($article->css_content == null){
        $article->css_content = "d-flex p-2 col-10 mx-auto";
    }
    if ($article->css_img == null){
        $article->css_img = "d-flex img-fluid w-75 mx-auto rounded-3 mt-2 mb-3";
    }
    ?>


    <div class="crypto-conteneur-articles" >
        <p class="crypto-level-articles" ><?= $article->level?></p>
        <h2 class="crypto-titre-articles" style="" ><?= $article->title ?></h2>

        <div class="crypto-conteneur-bas-articles" >
            <div id="div-parent-preview" class="crypto-img-textes-articles" style="">

                <div class="crypto-conteneur-img-articles" style="" >
                    <?= $this->Html->image("upload/" . $article->image, ['class'=>'crypto-img-articles','style' => $article->css_img ,'alt' => 'accueil'])?>
                </div>

                <p class="crypto-texte-articles"  style=""><?= nl2br($article->content)?></p>
                <div class="clear"></div>
            </div>
        </div>

    </div>

</main>
