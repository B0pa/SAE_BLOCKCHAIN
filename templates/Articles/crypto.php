<body class="bg-secondary col-12" >
<?= $this->element('nav')?>
<main class="pt-5 mt-5 col-12" >


    <div class="modal fade" id="cookieModal" tabindex="-1" aria-labelledby="cookieModalLabel" aria-hidden="true">
        <div class="modal-dialog text-white">
            <div class="modal-content bg-secondary border-3 border-dark">
                <div class="modal-header border-dark">
                    <h5 class="modal-title" id="cookieModalLabel">Politique des cookies</h5>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Ce site utilise des cookies pour améliorer votre expérience. Ils servent à sauvegarder votre score. En continuant à utiliser ce site, vous acceptez notre utilisation des cookies.
                </div>
                <div class="modal-footer border-dark">
                    <?php echo $this->Form->create(null, ['url' => ['controller' => 'Pages','action' => 'cookieAccept']]) ;?>
                    <?= $this->Form->button(__('Accept'), ['class' => 'btn btn-warning text-white rounded-3 slideFromTop ']) ?>
                    <?= $this->Form->end() ?>
                    <?php echo $this->Form->create(null, ['url' => ['controller' => 'Pages','action' => 'cookieRefuse']]) ;?>
                    <?= $this->Form->button(__('Refuse'), ['class' => 'btn btn-secondary bg-dark text-white rounded-3 slideFromTop ']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex">
        <input type="checkbox" id="toggleForm" class="d-none">
        <label for="toggleForm">
            <?=$this->Html->image('search.png', ['class' => 'img-fluid image-nav img-nav bg-warning rounded-circle p-2 position-fixed ','alt' => 'accueil','style' => 'right:10px; top:130px; width: 50px; height: 50px;'])?>
        </label>

        <form id="searchForm" action="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'search', 'crypto']) ?>" method="get" class="bg-dark position-fixed slideFromRight p-4 rounded-3 border border-1 border-warning" style="top:200px; right:-2px;">
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

        // si article par default
        if ($article->css_title == null){
            $article->css_title = "h2 text-center mt-1 p-2";
        }
        if ($article->css_content == null){
            $article->css_content = "d-flex p-2 col-10 mx-auto";
        }
        if ($article->css_img == null){
            $article->css_img = "d-flex img-fluid w-75 mx-auto rounded-3 mt-2 mb-3";
        }

        if ($article->position_image == null){
            $article->position_image = "d-flex img-fluid w-75 mx-auto rounded-3 mt-2 mb-3";
        }

        if ($article->position_image == "b"){
            $divposition = "d-flex p-2 mx-auto order-2";
            $article->css_content = $article->css_content . "order-1";
            echo "<div class='d-flex flex-column'>";
        }

        if ($article->position_image == "d"){
            $divposition = "float-end";
        }

        if ($article->position_image == "g"){
            $divposition = "float-start";

        }
        ?>

        <div class='d-flex flex-column bg-dark text-white col-12 col-md-10 mx-0 mx-md-auto my-4 p-2 rounded-3' >
            <p class="d-flex p-2 col-10 mx-auto" ><?= $article->level?></p>
            <h2 class=<?= $article->css_title ?> ><?= $article->title ?></h2>


            <div id="div-parent-preview" class=" flex-column "  style="overflow-y: auto;">

                <div class=<?= $divposition ?> >
                    <?= $this->Html->image("upload/" . $article->image, ['class' => $article->css_img ,'alt' => 'accueil','style' => ''])?>
                </div>

                <p class=<?= $article->css_content ?> style="text-align:justify;word-break:break-word;" ><?= nl2br($article->content)?></p>
                <div style="clear: both;"></div>
                <?php
                    if ($article->position_image == "b") {
                        echo "</div>";
                    }
                ?>
            </div>
        </div>

    <?php
    endforeach;
    ?>

    <?php
    /** @var \App\Model\Entity\Article[] $articles2 */
    foreach ($articles2 as $article) :

        // si article par default
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
        <div class='d-flex flex-column bg-dark text-white col-12 col-md-10 mx-0 mx-md-auto my-4 p-2 px-4 px-md-2 rounded-3' >
            <p class="d-flex p-2 col-10 mx-auto" ><?= $article->level?></p>
            <h2 class= 'my-3'<?= $article->css_title ?>><?= $article->title ?></h2>
            <p class=<?= $article->css_content ?> style="text-align: justify;" ><?= nl2br($article->content)?></p>
            <?= $this->Html->image("upload/" . $article->image, ['class' => $article->css_img ,'my-3','alt' => 'accueil','style' => ''])?>
        </div>
    <?php
    endforeach;
    ?>

    <?php
    /** @var \App\Model\Entity\Article[] $articles3 */
    foreach ($articles3 as $article) :

        // si article par default
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
        <div class='d-flex flex-column bg-dark text-white col-12 col-md-10 mx-0 mx-md-auto my-4 p-2 px-4 px-md-2 rounded-3' >
            <p class="d-flex p-2 col-10 mx-auto" ><?= $article->level?></p>
            <h2 class= 'my-3'<?= $article->css_title ?>><?= $article->title ?></h2>
            <p class=<?= $article->css_content ?> style="text-align: justify;" ><?= nl2br($article->content)?></p>
            <?= $this->Html->image("upload/" . $article->image, ['class' => $article->css_img ,'my-3','alt' => 'accueil','style' => ''])?>
        </div>
    <?php
    endforeach;
    ?>



    <?php //= $userName ?><!-- -->



    <a href="<?= $this->Url->build(['controller'=> 'Quiz', 'action' => 'quizzcrypto']) ?>" class="d-flex btn btn-warning text-white mx-auto justify-content-center mb-5 text-decoration-none text-center text-white col-6">
        Quiz
    </a>
</main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        if (<?php echo $this->getRequest()->getCookie('validation'); ?> == 0) {
            $('#cookieModal').modal('show');
        }

        $('#acceptCookies').click(function() {

            $('#cookieModal').modal('hide');
        });

        $('#disableCookies').click(function() {

            $('#cookieModal').modal('hide');
        });
    });
</script>
</body>
