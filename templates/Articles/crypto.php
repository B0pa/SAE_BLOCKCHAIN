

<main id="crypto-main" class="navmarge" >

    <div id="recherche-conteneur">
        <input type="checkbox" id="toggleForm">
        <label for="toggleForm" id="recherche-img">
            <?=$this->Html->image('search.png', ['id' => 'recherche-img','alt' => 'recherche'])?>
        </label>

        <form id="searchForm" action="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'search', 'crypto']) ?>" method="get" class="bg-dark position-fixed slideFromRight p-4 rounded-3 border border-1 border-warning" style="top:200px; right:-2px;z-index: 1;">
            <input type="text" name="query" placeholder="Rechercher..." class="form-control">
            <button type="submit" class="btn btn-secondary my-2 col-12" >Rechercher</button>
            <div class="d-flex" >
                <input type="checkbox" name="levels[]" value="Niv 1" id="Niv 1" class="myformcheck form-check-input align-self-center" checked>
                <label for="Niv 1" class="myformlabel form-check-label bg-secondary p-2 rounded-3 mx-auto">Niv 1</label>

                <input type="checkbox" name="levels[]" value="Niv 2" id="Niv 2" class="myformcheck form-check-input align-self-center" checked>
                <label for="Niv 2" class="myformlabel form-check-label bg-secondary p-2 rounded-3 mx-auto">Niv 2</label>

                <input type="checkbox" name="levels[]" value="Niv 3" id="Niv 3" class="myformcheck form-check-input align-self-center" checked>
                <label for="Niv 3" class="myformlabel form-check-label bg-secondary p-2 rounded-3 mx-auto">Niv 3</label>
            </div>
        </form>
    </div>

    <div id="crypto-conteneur-titreimg" >
        <?= $this->Html->image('crypto.gif', ['id' => 'crypto-img-entete']); ?>
        <h1 id="crypto-h1" >
            Les Cryptomonnaies
        </h1>
    </div>


    <?php
    if (isset($articles1)) {
    /** @var \App\Model\Entity\Article[] $articles1 */
    foreach ($articles1 as $article) :
        $divposition = "";
        $flexStyle = " ";
        // si article par default
        if ($article->css_title == null){
            $article->css_title = "";
        }
        if ($article->css_content == null){
            $article->css_content = "display:flex;";
        }
        if ($article->css_img == null){
            $article->css_img = "width:100%;";
        }

        if ($article->position_image == null){
            $article->position_image = "display:flex;width:75%; margin-left:auto;margin-right:auto;";
        }

        if ($article->position_image == "b"){
            $divposition = "width:50%;order:2;";
            $article->css_content = $article->css_content . " order:1;";
            $flexStyle = "flex-direction:column; ";
            $article->css_img = "width:100%;";
        }

        if ($article->position_image == "d"){
            $divposition = "width:25%;float:right;margin-left:20px; ";
            $article->css_content = "";
            $flexStyle = "justify-content:flex-end;";
            $article->css_img = "width:100%;";
        }

        if ($article->position_image == "g"){
            $divposition = "width:25%;float:left;margin-right:20px;";
            $article->css_content = "";
            $flexStyle = "justify-content:flex-start;";
            $article->css_img = "width:100%;";

        }
        ?>

        <div class="crypto-conteneur-articles" >
            <p class="crypto-level-articles" ><?= $article->level?></p>
            <h2 class="crypto-titre-articles" style="<?= $article->css_title ?>" ><?= $article->title ?></h2>

            <div class="crypto-conteneur-bas-articles" >
                <div id="div-parent-preview" class="crypto-img-textes-articles" style="<?= $flexStyle ?>">

                    <div class="crypto-conteneur-img-articles" style="<?= $divposition ?>" >
                        <?= $this->Html->image("upload/" . $article->image, ['class'=>'crypto-img-articles','style' => $article->css_img ,'alt' => 'accueil'])?>
                    </div>

                    <p class="crypto-texte-articles"  style="<?= $article->css_content ?>"><?= nl2br($article->content)?></p>
                    <div class="clear"></div>
                </div>
            </div>

        </div>


    <?php
    endforeach;
    }
    ?>

    <?php
    if (isset($articles2)) {
    /** @var \App\Model\Entity\Article[] $articles2 */
    foreach ($articles2 as $article) :
        $divposition = "";
        $flexStyle = " ";
        // si article par default
        if ($article->css_title == null){
            $article->css_title = "";
        }
        if ($article->css_content == null){
            $article->css_content = "display:flex;";
        }
        if ($article->css_img == null){
            $article->css_img = "width:100%;";
        }

        if ($article->position_image == null){
            $article->position_image = "display:flex;width:75%; margin-left:auto;margin-right:auto;";
        }

        if ($article->position_image == "b"){
            $divposition = "width:50%;order:2;";
            $article->css_content = $article->css_content . " order:1;";
            $flexStyle = "flex-direction:column; ";
            $article->css_img = "width:100%;";
        }

        if ($article->position_image == "d"){
            $divposition = "width:25%;float:right;margin-left:20px; ";
            $article->css_content = "";
            $flexStyle = "justify-content:flex-end;";
            $article->css_img = "width:100%;";
        }

        if ($article->position_image == "g"){
            $divposition = "width:25%;float:left;margin-right:20px;";
            $article->css_content = "";
            $flexStyle = "justify-content:flex-start;";
            $article->css_img = "width:100%;";

        }
        ?>

        <div class="crypto-conteneur-articles" >
            <p class="crypto-level-articles" ><?= $article->level?></p>
            <h2 class="crypto-titre-articles" style="<?= $article->css_title ?>" ><?= $article->title ?></h2>

            <div class="crypto-conteneur-bas-articles" >
                <div id="div-parent-preview" class="crypto-img-textes-articles" style="<?= $flexStyle ?>">

                    <div class="crypto-conteneur-img-articles" style="<?= $divposition ?>" >
                        <?= $this->Html->image("upload/" . $article->image, ['class'=>'crypto-img-articles','style' => $article->css_img ,'alt' => 'accueil'])?>
                    </div>

                    <p class="crypto-texte-articles"  style="<?= $article->css_content ?>"><?= nl2br($article->content)?></p>
                    <div class="clear"></div>
                </div>
            </div>

        </div>

    <?php
    endforeach;
    }
    ?>

    <?php
    if (isset($articles3)) {
    /** @var \App\Model\Entity\Article[] $articles3 */
    foreach ($articles3 as $article) :

        $divposition = "";
        $flexStyle = " ";
        // si article par default
        if ($article->css_title == null){
            $article->css_title = "";
        }
        if ($article->css_content == null){
            $article->css_content = "display:flex;";
        }
        if ($article->css_img == null){
            $article->css_img = "width:100%;";
        }

        if ($article->position_image == null){
            $article->position_image = "display:flex;width:75%; margin-left:auto;margin-right:auto;";
        }

        if ($article->position_image == "b"){
            $divposition = "width:50%;order:2;";
            $article->css_content = $article->css_content . " order:1;";
            $flexStyle = "flex-direction:column; ";
            $article->css_img = "width:100%;";
        }

        if ($article->position_image == "d"){
            $divposition = "width:25%;float:right;margin-left:20px; ";
            $article->css_content = "";
            $flexStyle = "justify-content:flex-end;";
            $article->css_img = "width:100%;";
        }

        if ($article->position_image == "g"){
            $divposition = "width:25%;float:left;margin-right:20px;";
            $article->css_content = "";
            $flexStyle = "justify-content:flex-start;";
            $article->css_img = "width:100%;";

        }
        ?>

        <div class="crypto-conteneur-articles" >
            <p class="crypto-level-articles" ><?= $article->level?></p>
            <h2 class="crypto-titre-articles" style="<?= $article->css_title ?>" ><?= $article->title ?></h2>

            <div class="crypto-conteneur-bas-articles" >
                <div id="div-parent-preview" class="crypto-img-textes-articles" style="<?= $flexStyle ?>">

                    <div class="crypto-conteneur-img-articles" style="<?= $divposition ?>" >
                        <?= $this->Html->image("upload/" . $article->image, ['class'=>'crypto-img-articles','style' => $article->css_img ,'alt' => 'accueil'])?>
                    </div>

                    <p class="crypto-texte-articles"  style="<?= $article->css_content ?>"><?= nl2br($article->content)?></p>
                    <div class="clear"></div>
                </div>
            </div>

        </div>


    <?php
    endforeach;
    }
    ?>



    <?php //= $userName ?><!-- -->



    <a href="<?= $this->Url->build(['controller'=> 'Quiz', 'action' => 'quizzcrypto']) ?>" class="d-flex btn btn-warning text-white mx-auto justify-content-center mb-5 text-decoration-none text-center text-white col-6">
        Quiz
    </a>
</main>

