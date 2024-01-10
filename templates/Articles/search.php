<body class="bg-secondary" >
<?= $this->element('nav')?>
<main class="pt-5 mt-5" >
    <?php  /** @var \App\Model\Entity\Article[] $category */ ?>

    <form action="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'search', $category]) ?>" method="get">
        <input type="text" name="query" placeholder="Rechercher...">
        <button type="submit">Rechercher</button>
    </form>

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
