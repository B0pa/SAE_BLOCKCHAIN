<body class="bg-secondary" >


<?= $this->element('nav')?>
<main class="pt-5 mt-5" >
    <?php  /** @var \App\Model\Entity\Article[] $category */
    ?>

    <div class="d-flex">
        <input type="checkbox" id="toggleForm" class="d-none">
        <label for="toggleForm">
            <?=$this->Html->image('search.png', ['class' => 'img-fluid image-nav img-nav bg-warning rounded-circle p-2 position-fixed ','alt' => 'accueil','style' => 'right:10px; top:130px; width: 50px; height: 50px;'])?>
        </label>

        <form id="searchForm" action="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'search', 'crypto']) ?>" method="get" class="bg-dark position-fixed slideFromRight p-4 rounded-3 border border-1 border-warning" style="top:200px; right:-2px;">
            <input type="text" name="query" placeholder="Rechercher..." class="form-control">
            <button type="submit" class="btn btn-secondary my-2" >Rechercher</button>

            <input type="checkbox" checked id="Niv 1">
            <label for="Niv 1" class="bg-secondary">Niv 1</label>

            <input type="checkbox" checked id="Niv 2">
            <label for="Niv 2" class="bg-secondary">Niv 2</label>

            <input type="checkbox" checked id="Niv 3">
            <label for="Niv 3" class="bg-secondary">Niv 3</label>
        </form>

    </div>
    <?php
    /** @var \App\Model\Entity\Article[] $articles1 */
    /** @var \App\Model\Entity\Article[] $articles2 */
    /** @var \App\Model\Entity\Article[] $articles3 */
    debug($articles1);
    debug($articles2);
    debug($articles3);
    foreach ($articles1 as $article) :
        ?>
        <div class='d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3 <?= strtolower($article->level) ?>' >
            <p class="d-flex p-2 col-10 mx-auto" ><?= $article->level?></p>
            <h2 class=<?= $article->css_title ?> ><?= $article->title ?></h2>
            <p class=<?= $article->css_content ?> style="text-align: justify;" ><?= nl2br($article->content)?></p>
            <?= $this->Html->image("upload/" . $article->image, ['class' => $article->css_img ,'alt' => 'accueil','style' => ''])?>
        </div>
    <?php
    endforeach;
    ?>

    <?php
    foreach ($articles2 as $article) :
        ?>
        <div class='d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3 <?= strtolower($article->level) ?>' >
            <p class="d-flex p-2 col-10 mx-auto" ><?= $article->level?></p>
            <h2 class=<?= $article->css_title ?> ><?= $article->title ?></h2>
            <p class=<?= $article->css_content ?> style="text-align: justify;" ><?= nl2br($article->content)?></p>
            <?= $this->Html->image("upload/" . $article->image, ['class' => $article->css_img ,'alt' => 'accueil','style' => ''])?>
        </div>
    <?php
    endforeach;
    ?>


    <?php
    foreach ($articles3 as $article) :
        ?>
        <div class='d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3 <?= strtolower($article->level) ?>' >
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
<script>

    // Ajoutez un écouteur d'événements à chaque case à cocher
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            // Obtenez le niveau correspondant à la case à cocher
            const level = this.id.toLowerCase().replace(' ', '');

            // Sélectionnez tous les éléments de ce niveau
            const elements = document.querySelectorAll(`.${level}`);

            // Affichez ou masquez les éléments en fonction de l'état de la case à cocher
            elements.forEach(element => {
                element.style.display = this.checked ? 'block' : 'none';
            });
        });
    });
</script>
