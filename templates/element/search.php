
<?php
$currentURL = strtolower(basename($_SERVER['REQUEST_URI']));
$pageTitle = $currentURL; // Valeur par défaut
?>


    <form id="searchForm" action="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'search', $currentURL]) ?>" method="get" class="bg-dark position-fixed slideFromRight p-4 rounded-3 border border-1 border-warning" style="top:200px; right:-2px;z-index: 1;">
        <input type="text" name="query" placeholder="Rechercher..." class="form-control">
        <button type="submit" class="btn btn-secondary my-2 col-12" >Rechercher</button>
        <div class="d-flex" >
            <input type="checkbox" name="levels[]" value="Niv 1" id="Niv 1" class="myformcheck form-check-input align-self-center" checked>
            <label for="Niv 1" class="myformlabel form-check-label bg-secondary p-2 rounded-3 mx-auto">Niv 1</label>

            <input type="checkbox" name="levels[]" value="Niv 2" id="Niv 2" class="myformcheck form-check-input align-self-center" checked>
            <label for="Niv 2" class="myformlabel form-check-label bg-secondary p-2 rounded-3 mx-auto">Niv 2</label>

            <input type="checkbox" name="levels[]" value="Niv 3" id="Niv 3" class="myformcheck form-check-input align-self-center" checked>
            <label for="Niv 3" class="myformlabel form-check-label bg-secondary p-2 rounded-3 mx-auto">Niv 3</label>
        </div>
    </form>

