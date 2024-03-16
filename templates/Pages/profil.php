<?php

$blockchain = $this->request->getCookie('blockchainLevel');
$crypto = $this->request->getCookie('cryptoLevel');
$nft = $this->request->getCookie('nftLevel');
$danger = $this->request->getCookie('dangerLevel');

if ($blockchain == 0) {
    $blockchain = "Tous les niveaux";
} else if ($blockchain == 1) {
    $blockchain = "Niv 1";
} else if ($blockchain == 2) {
    $blockchain = "Niv 2";
} else if ($blockchain == 3) {
    $blockchain = "Niv 3";
} else {
    $blockchain = "Tous les niveaux";
}

if ($crypto == 0) {
    $crypto = "Tous les niveaux";
} else if ($crypto == 1) {
    $crypto = "Niv 1";
} else if ($crypto == 2) {
    $crypto = "Niv 2";
} else if ($crypto == 3) {
    $crypto = "Niv 3";
} else {
    $crypto = "Tous les niveaux";
}

if ($nft == 0) {
    $nft = "Tous les niveaux";
} else if ($nft == 1) {
    $nft = "Niv 1";
} else if ($nft == 2) {
    $nft = "Niv 2";
} else if ($nft == 3) {
    $nft = "Niv 3";
} else {
    $nft = "Tous les niveaux";
}

if ($danger == 0) {
    $danger = "Tous les niveaux";
} else if ($danger == 1) {
    $danger = "Niv 1";
} else if ($danger == 2) {
    $danger = "Niv 2";
} else if ($danger == 3) {
    $danger = "Niv 3";
} else {
    $danger = "Tous les niveaux";
}

?>

<main id="profil-main" class="navmarge" style="color:#FFF;" >
    <h2 id="profil-first-h2" >Choisir les niveaux</h2>
    <div id="profil-niveau-conteneur" >
        <div id="profil-niveau-choix">
            <?= $this->Form->create(null, ['url' => ['controller' => 'Pages', 'action' => 'manageCookies']]) ?>
            <?= $this->Form->control('category', ['type' => 'select', 'options' => ['blockchain', 'crypto', 'nft', 'danger']]) ?>
            <?= $this->Form->control('level', ['type' => 'select', 'options' => ['Tout les niveaux', 'Niv 1', 'Niv 2', 'Niv 3']]) ?>
            <?= $this->Form->button('Définir le niveau', ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
        
        <div class="wrap-table100">
            <div class="table">
                <div class="row header">
                    <div class="cell"><p>Catégories</p></div>
                    <div class="cell"><p>Niveaux</p></div>
                </div>
                <div class="row">
                    <div class="cell" data-title="categorie"><p><?= "Blockchain"?></p></div>
                    <div class="cell" data-title="niveau"><p><?= $blockchain ?></p></div>
                </div>
                <div class="row">
                    <div class="cell" data-title="categorie"><p><?= "Crypto"?></p></div>
                    <div class="cell" data-title="niveau"><p><?= $crypto ?></p></div>
                </div>
                <div class="row">
                    <div class="cell" data-title="categorie"><p><?= "NFT"?></p></div>
                    <div class="cell" data-title="niveau"><p><?= $nft ?></p></div>
                </div>
                <div class="row">
                    <div class="cell" data-title="categorie"><p><?= "Danger"?></p></div>
                    <div class="cell" data-title="niveau"><p><?= $danger ?></p></div>
                </div>
            </div>
        </div>
    </div>
    <h2 id="profil-second-h2" >Supprimer les cookies</h2>
    <button id="profil-btn-suppcookie-conteneur" class="grow" >Supprimer tous les cookies</button>

    <div id="profil-modal-suppcookie-overlay">
        <div id="profil-modal-suppcookie" >
            <h2>Êtes-vous sûr de vouloir supprimer tous les cookies ? Vous perderez tous vos scores .</h2>
            <div id="profil-buttons-choix" >
                <?php
                echo $this->Form->create(null, ['url' => ['controller' => 'Pages', 'action' => 'deleteAllCookies']]);
                echo $this->Form->button('Oui', ['id' => 'btn-supp-cookie-ever','class'=>'grow']) ;
                echo $this->Form->end();
                ?>
                <button id="btn-cancel-suppcookie" class="grow" >Non</button>
            </div>
        </div>
    </div>


</main>
<script>

    var divOverlay = document.getElementById("profil-modal-suppcookie-overlay");
    divOverlay.style.display = "none";
    document.getElementById("profil-btn-suppcookie-conteneur").onclick = function() {

        if (divOverlay.style.display === "none") {
            divOverlay.style.display = "block";
        } else {
            divOverlay.style.display = "none";
        }
    };

    document.getElementById("btn-cancel-suppcookie").onclick = function() {
        divOverlay.style.display = "none";
    };


</script>
