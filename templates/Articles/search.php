<body class="bg-secondary" >


<?= $this->element('nav')?>
<main class="pt-5 mt-5" >
    <?php  /** @var \App\Model\Entity\Article[] $category */

    /** @var \App\Model\Entity\Article[] $articles1 */
    /** @var \App\Model\Entity\Article[] $articles2 */
    /** @var \App\Model\Entity\Article[] $articles3 */


    ?>

    <div class="d-flex">
        <input type="checkbox" id="toggleForm" class="d-none">
        <label for="toggleForm">
            <?=$this->Html->image('search.png', ['class' => 'img-fluid image-nav img-nav bg-warning rounded-circle p-2 position-fixed ','alt' => 'accueil','style' => 'right:10px; top:130px; width: 50px; height: 50px;'])?>
        </label>

        <form id="searchForm" action="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'search', $category]) ?>" method="get" class="bg-dark position-fixed slideFromRight p-4 rounded-3 border border-1 border-warning" style="top:200px; right:-2px;z-index: 1;">
            <input type="text" name="query" placeholder="Rechercher..." class="form-control">
            <button type="submit" class="btn btn-secondary my-2 col-12" >Rechercher</button>
            <div class="d-flex" >
                <input type="checkbox" name="levels[]" value="Niv 1" id="Niv 1" class="myformcheck form-check-input align-self-center" <?= !empty($articles1) ? 'checked' : '' ?>>
                <label for="Niv 1" class="myformlabel form-check-label bg-secondary p-2 rounded-3 mx-auto">Niv 1</label>

                <input type="checkbox" name="levels[]" value="Niv 2" id="Niv 2" class="myformcheck form-check-input align-self-center" <?= !empty($articles2) ? 'checked' : '' ?>>
                <label for="Niv 2" class="myformlabel form-check-label bg-secondary p-2 rounded-3 mx-auto">Niv 2</label>

                <input type="checkbox" name="levels[]" value="Niv 3" id="Niv 3" class="myformcheck form-check-input align-self-center" <?= !empty($articles3) ? 'checked' : '' ?>>
                <label for="Niv 3" class="myformlabel form-check-label bg-secondary p-2 rounded-3 mx-auto">Niv 3</label>

            </div>
        </form>

    </div>
    <?php


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
