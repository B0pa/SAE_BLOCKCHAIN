
<body class="bg-secondary" >
<?= $this->element('nav')?>
<main class="pt-5 mt-5" >
    <?= $this->Html->image('NFT.png', ['class' => 'd-flex rounded-circle mt-3 mx-auto spin slideFromTop','alt' => 'NFT image']); ?>
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
        <div class='d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3' >
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
        <div class='d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3' >
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
        <div class='d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3' >
            <p class="d-flex p-2 col-10 mx-auto" ><?= $article->level?></p>
            <h2 class=<?= $article->css_title ?> ><?= $article->title ?></h2>
            <p class=<?= $article->css_content ?> style="text-align: justify;" ><?= nl2br($article->content)?></p>
            <?= $this->Html->image("upload/" . $article->image, ['class' => $article->css_img ,'alt' => 'accueil','style' => ''])?>
        </div>
    <?php
    endforeach;
    ?>



    <div class="d-flex btn btn-warning text-white ms-auto justify-content-center me-5 mb-5 text-decoration-none text-center text-white col-1" >
        <?= $this->Html->link(
            "Quizz",
            ['controller'=> 'Quiz', 'action' => 'quizz_n_f_t'],
            [
                'class' => 'nav-link d-flex align-items-center text-decoration-none text-center text-dark',
                'escapeTitle' => false
            ]
        ) ?>
    </div>

</main>
</body>
