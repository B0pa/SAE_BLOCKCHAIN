
<?php
$currentURL = strtolower(basename($_SERVER['REQUEST_URI']));
$pageTitle = $currentURL; // Valeur par défaut
?>


    <form id="searchForm" action="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'search', $currentURL]) ?>" method="get" class="" style="">
        <input type="text" name="query" placeholder="Rechercher..." class="search-input-search">
        <button type="submit" class="search-btn-search grow" >Rechercher</button>
        <div id="search-conteneur-niv" >
            <input type="checkbox" name="levels[]" value="Niv 1" id="Niv 1" class="myformcheck form-check-input align-self-center" checked>
            <label for="Niv 1" class="myformlabel form-check-label bg-secondary p-2 rounded-3 mx-auto">Niv 1</label>

            <input type="checkbox" name="levels[]" value="Niv 2" id="Niv 2" class="myformcheck form-check-input align-self-center" checked>
            <label for="Niv 2" class="myformlabel form-check-label bg-secondary p-2 rounded-3 mx-auto">Niv 2</label>

            <input type="checkbox" name="levels[]" value="Niv 3" id="Niv 3" class="myformcheck form-check-input align-self-center" checked>
            <label for="Niv 3" class="myformlabel form-check-label bg-secondary p-2 rounded-3 mx-auto">Niv 3</label>
        </div>
    </form>

