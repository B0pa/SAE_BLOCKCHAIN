<body class="bg-secondary col-12" >
<?= $this->element('nav')?>
<main class="pt-5 mt-5 col-12" >

    <div class="d-flex">
        <input type="checkbox" id="toggleForm" class="d-none">
        <label for="toggleForm">
            <?=$this->Html->image('search.png', ['class' => 'img-fluid image-nav img-nav bg-warning rounded-circle p-2 position-fixed ','alt' => 'accueil','style' => 'right:10px; top:130px; width: 50px; height: 50px;'])?>
        </label>

        <form id="searchForm" action="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'search', 'crypto']) ?>" method="get" class="bg-dark position-fixed slideFromRight p-4 rounded-3 border border-1 border-warning" style="top:200px; right:-2px;z-index:1;">
            <input type="text" name="query" placeholder="Rechercher..." class="form-control">
            <button type="submit" class="btn btn-secondary my-2" >Rechercher</button>
        </form>

    </div>

    <?= $this->Html->image('crypto.png', ['class' => 'd-flex rounded-circle mt-3 mx-auto spin slideFromTop','alt' => 'NFT image']); ?>
    <?php
    /** @var \App\Model\Entity\Article[] $articles1 */
    foreach ($articles1 as $article) :

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
        <div class='d-flex flex-column bg-dark text-white col-12 col-md-10 mx-0 mx-md-auto my-4 p-2 rounded-3' >
            <p class="d-flex p-2 col-10 mx-auto" ><?= $article->level?></p>
            <h2 class=<?= $article->css_title ?> ><?= $article->title ?></h2>
            <p class=<?= $article->css_content ?> style="text-align: justify;" ><?= nl2br($article->content)?></p>
            <?= $this->Html->image("upload/" . $article->image, ['class' => $article->css_img ,'alt' => 'accueil','style' => ''])?>
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
        <div class='d-flex flex-column bg-dark text-white col-12 col-md-10 mx-0 mx-md-auto my-4 p-2 rounded-3' >
            <p class="d-flex p-2 col-10 mx-auto" ><?= $article->level?></p>
            <h2 class=<?= $article->css_title ?> ><?= $article->title ?></h2>
            <p class=<?= $article->css_content ?> style="text-align: justify;" ><?= nl2br($article->content)?></p>
            <?= $this->Html->image("upload/" . $article->image, ['class' => $article->css_img ,'alt' => 'accueil','style' => ''])?>
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
        <div class='d-flex flex-column bg-dark text-white col-12 col-md-10 mx-0 mx-md-auto my-4 p-2 rounded-3' >
            <p class="d-flex p-2 col-10 mx-auto" ><?= $article->level?></p>
            <h2 class=<?= $article->css_title ?> ><?= $article->title ?></h2>
            <p class=<?= $article->css_content ?> style="text-align: justify;" ><?= nl2br($article->content)?></p>
            <?= $this->Html->image("upload/" . $article->image, ['class' => $article->css_img ,'alt' => 'accueil','style' => ''])?>
        </div>
    <?php
    endforeach;
    ?>



    <?php //= $userName ?><!-- -->



    <a href="<?= $this->Url->build(['controller'=> 'Quiz', 'action' => 'quizzcrypto']) ?>" class="d-flex btn btn-warning text-white mx-auto justify-content-center mb-5 text-decoration-none text-center text-white col-6">
        Quiz
    </a>
</main>
</body>
