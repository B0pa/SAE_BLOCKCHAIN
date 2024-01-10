<body class="bg-secondary" >
<?= $this->element('nav')?>
<main class="pt-5 mt-5" >
    <?php  /** @var \App\Model\Entity\Article[] $category */ ?>

    <div class="d-flex">
        <input type="checkbox" id="toggleForm" class="d-none">
        <label for="toggleForm">
            <?=$this->Html->image('search.png', ['class' => 'img-fluid image-nav img-nav bg-warning rounded-circle p-2 position-fixed ','alt' => 'accueil','style' => 'right:10px; top:130px; width: 50px; height: 50px;'])?>
        </label>

        <form id="searchForm" action="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'search', 'crypto']) ?>" method="get" class="bg-dark position-fixed slideFromRight p-4 rounded-3 border border-1 border-warning" style="top:200px; right:-2px;">
            <input type="text" name="query" placeholder="Rechercher..." class="form-control">
            <button type="submit" class="btn btn-secondary my-2" >Rechercher</button>
        </form>

    </div>
    <?php
    /** @var \App\Model\Entity\Article[] $articles */
    foreach ($articles as $article) :
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

</main>
</body>
