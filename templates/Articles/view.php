
<main class="pt-3 p-3" >
    <?= $this->Html->link(
        'Aller à l\'accueil',
        ['controller'=> 'Pages', 'action' => 'home'],
        [
            'class' => 'btn btn-warning ',
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

    <div class='d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3' >
        <p class="d-flex p-2 col-10 mx-auto" ><?= $article->level?></p>
        <h2 class=<?= $article->css_title ?> ><?= $article->title ?></h2>
        <p class=<?= $article->css_content ?> style="text-align: justify;" ><?= nl2br($article->content)?></p>
        <?= $this->Html->image("upload/" . $article->image, ['class' => $article->css_img ,'alt' => 'accueil','style' => ''])?>
    </div>

</main>

