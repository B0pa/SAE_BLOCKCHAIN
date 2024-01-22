<body class="bg-secondary col-12" >
<?= $this->element('nav')?>
<main class="pt-5 mt-5 col-12"  style="min-height: 100vh; " >

    <div class="d-flex">
        <input type="checkbox" id="toggleForm" class="d-none">
        <label for="toggleForm">
            <?=$this->Html->image('search.png', ['class' => 'img-fluid image-nav img-nav bg-warning rounded-circle p-2 position-fixed ','alt' => 'accueil','style' => 'right:10px; top:130px; width: 50px; height: 50px;'])?>
        </label>

        <form id="searchForm" action="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'search', 'crypto']) ?>" method="get" class="bg-dark position-fixed slideFromRight p-4 rounded-3 border border-1 border-warning" style="top:200px; right:-2px;z-index: 1;">
            <button type="submit" class="btn btn-secondary my-2 col-12" >Rechercher</button>
            <div class="d-flex" >
                <input type="checkbox" name="levels[]" value="Niv 1" id="Niv 1" class="myformcheck form-check-input align-self-center">
                <label for="Niv 1" class="myformlabel form-check-label bg-secondary p-2 rounded-3 mx-auto">Niv 1</label>

                <input type="checkbox" name="levels[]" value="Niv 2" id="Niv 2" class="myformcheck form-check-input align-self-center">
                <label for="Niv 2" class="myformlabel form-check-label bg-secondary p-2 rounded-3 mx-auto">Niv 2</label>

                <input type="checkbox" name="levels[]" value="Niv 3" id="Niv 3" class="myformcheck form-check-input align-self-center">
                <label for="Niv 3" class="myformlabel form-check-label bg-secondary p-2 rounded-3 mx-auto">Niv 3</label>
            </div>
        </form>

    </div>


    <?= $this->Html->image('crypto.gif', ['class' => 'd-flex rounded-circle mt-3 mx-auto spin slideFromTop','alt' => 'NFT image','style'=> 'width :200px']); ?>
    <?php
    /** @var \App\Model\Entity\Article[] $articles1 */
    foreach ($articles1 as $article) :
        $divposition = "";
        $flexStyle = " ";
        // si article par default
        if ($article->css_title == null){
            $article->css_title = "h2 text-center mt-1 p-2";
        }
        if ($article->css_content == null){
            $article->css_content = "d-flex p-2 col-10 mx-auto";
        }
        if ($article->css_img == null){
            $article->css_img = "img-fluid";
        }

        if ($article->position_image == null){
            $article->position_image = "d-flex img-fluid w-75 mx-auto rounded-3 mt-2 mb-3";
        }

        if ($article->position_image == "b"){
            $divposition = "order-2";
            $article->css_content = $article->css_content . " order-1";
            $flexStyle = "d-flex";
        }

        if ($article->position_image == "d"){
            $divposition = "w-25 float-end m-2 ms-4";
            $article->css_content = "p-2 col-10 mx-auto";
            $flexStyle = "";
        }

        if ($article->position_image == "g"){
            $divposition = "w-25 float-start m-2 me-4";
            $article->css_content = "p-2 col-10";
            $flexStyle = "";

        }
        ?>

        <div class='d-flex flex-column bg-dark text-white col-12 col-md-10 mx-0 mx-md-auto my-4 p-2 rounded-3 justify-content-end ' >
            <p class="d-flex p-2 col-10 mx-auto" ><?= $article->level?></p>
            <h2 class="<?= $article->css_title ?>" ><?= $article->title ?></h2>

            <div class="d-flex col-10 mx-auto align-content-center border-top border-2 border-white pt-2" >
                <div id="div-parent-preview" class="<?= $flexStyle ?> flex-column "  style="overflow-y: auto;">

                    <div class="<?= $divposition ?>" >
                        <?= $this->Html->image("upload/" . $article->image, ['class' => $article->css_img ,'alt' => 'accueil','style' => 'width:100%'])?>
                    </div>

                    <p class="<?= $article->css_content ?> w-100" style="text-align:justify;  " ><?= nl2br($article->content)?></p>
                    <div class="clear"></div>
                </div>
            </div>

        </div>

    <?php
    endforeach;
    ?>

    <?php
    /** @var \App\Model\Entity\Article[] $articles2 */
    foreach ($articles2 as $article) :
        $divposition = "";
        $flexStyle = " ";
        // si article par default
        if ($article->css_title == null){
            $article->css_title = "h2 text-center mt-1 p-2";
        }
        if ($article->css_content == null){
            $article->css_content = "d-flex p-2 col-10 mx-auto";
        }
        if ($article->css_img == null){
            $article->css_img = "img-fluid";
        }

        if ($article->position_image == null){
            $article->position_image = "d-flex img-fluid w-75 mx-auto rounded-3 mt-2 mb-3";
        }

        if ($article->position_image == "b"){
            $divposition = "order-2";
            $article->css_content = $article->css_content . " order-1";
            $flexStyle = "d-flex";
        }

        if ($article->position_image == "d"){
            $divposition = "w-25 float-end m-2 ms-4";
            $article->css_content = "p-2 col-10 mx-auto";
            $flexStyle = "";
        }

        if ($article->position_image == "g"){
            $divposition = "w-25 float-start m-2 me-4";
            $article->css_content = "p-2 col-10";
            $flexStyle = "";

        }
        ?>

        <div class='d-flex flex-column bg-dark text-white col-12 col-md-10 mx-0 mx-md-auto my-4 p-2 rounded-3 justify-content-end ' >
            <p class="d-flex p-2 col-10 mx-auto" ><?= $article->level?></p>
            <h2 class="<?= $article->css_title ?>" ><?= $article->title ?></h2>

            <div class="d-flex col-10 mx-auto align-content-center border-top border-2 border-white pt-2" >
                <div id="div-parent-preview" class="<?= $flexStyle ?> flex-column "  style="overflow-y: auto;">

                    <div class="<?= $divposition ?>" >
                        <?= $this->Html->image("upload/" . $article->image, ['class' => $article->css_img ,'alt' => 'accueil','style' => 'width:100%'])?>
                    </div>

                    <p class="<?= $article->css_content ?> w-100" style="text-align:justify;  " ><?= nl2br($article->content)?></p>
                    <div class="clear"></div>
                </div>
            </div>

        </div>

    <?php
    endforeach;
    ?>

    <?php
    /** @var \App\Model\Entity\Article[] $articles3 */
    foreach ($articles3 as $article) :

        $divposition = "";
        $flexStyle = " ";
        // si article par default
        if ($article->css_title == null){
            $article->css_title = "h2 text-center mt-1 p-2";
        }
        if ($article->css_content == null){
            $article->css_content = "d-flex p-2 col-10 mx-auto";
        }
        if ($article->css_img == null){
            $article->css_img = "img-fluid";
        }

        if ($article->position_image == null){
            $article->position_image = "d-flex img-fluid w-75 mx-auto rounded-3 mt-2 mb-3";
        }

        if ($article->position_image == "b"){
            $divposition = "order-2";
            $article->css_content = $article->css_content . " order-1";
            $flexStyle = "d-flex";
        }

        if ($article->position_image == "d"){
            $divposition = "w-25 float-end m-2 ms-4";
            $article->css_content = "p-2 col-10 mx-auto";
            $flexStyle = "";
        }

        if ($article->position_image == "g"){
            $divposition = "w-25 float-start m-2 me-4";
            $article->css_content = "p-2 col-10";
            $flexStyle = "";

        }
        ?>

        <div class='d-flex flex-column bg-dark text-white col-12 col-md-10 mx-0 mx-md-auto my-4 p-2 rounded-3 justify-content-end ' >
            <p class="d-flex p-2 col-10 mx-auto" ><?= $article->level?></p>
            <h2 class="<?= $article->css_title ?>" ><?= $article->title ?></h2>

            <div class="d-flex col-10 mx-auto align-content-center border-top border-2 border-white pt-2" >
                <div id="div-parent-preview" class="<?= $flexStyle ?> flex-column "  style="overflow-y: auto;">

                    <div class="<?= $divposition ?>" >
                        <?= $this->Html->image("upload/" . $article->image, ['class' => $article->css_img ,'alt' => 'accueil','style' => 'width:100%'])?>
                    </div>

                    <p class="<?= $article->css_content ?> w-100" style="text-align:justify;  " ><?= nl2br(htmlspecialchars($article->content))?></p>
                    <div class="clear"></div>
                </div>
            </div>

        </div>

    <?php
    endforeach;
    ?>



    <?php //= $userName ?><!-- -->



    <a href="<?= $this->Url->build(['controller'=> 'Quiz', 'action' => 'quizzcrypto']) ?>" class="d-flex btn btn-warning text-white mx-auto justify-content-center mb-5 text-decoration-none text-center text-white col-6">
        Quiz
    </a>
</main>
<?= $this->element('footer')?>
</body>
