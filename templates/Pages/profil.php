
<?= $this->element('nav2')?>
<main class="" style="color:#FFF;" >
    <div class="">
        <h2 class="" >Supprimer les cookies</h2>
        <p>Êtes-vous sûr de vouloir supprimer tous les cookies ?</p>
        <?= $this->Html->link('Supprimer tous les cookies', ['controller' => 'Pages', 'action' => 'deleteAllCookies'], ['class' => 'btn btn-danger']) ?>
    </div>
    <dive>
        <?php

        $blockchain = $this->request->getCookie('blockchainLevel');
        $crypto = $this->request->getCookie('cryptoLevel');
        $nft = $this->request->getCookie('nftLevel');
        $danger = $this->request->getCookie('dangerLevel');

        if ($blockchain == 0) {
            $blockchain = "Tout les niveaux";
        } else if ($blockchain == 1) {
            $blockchain = "Niv 1";
        } else if ($blockchain == 2) {
            $blockchain = "Niv 2";
        } else if ($blockchain == 3) {
            $blockchain = "Niv 3";
        } else {
            $blockchain = "Tout les niveaux";
        }

        if ($crypto == 0) {
            $crypto = "Tout les niveaux";
        } else if ($crypto == 1) {
            $crypto = "Niv 1";
        } else if ($crypto == 2) {
            $crypto = "Niv 2";
        } else if ($crypto == 3) {
            $crypto = "Niv 3";
        } else {
            $crypto = "Tout les niveaux";
        }

        if ($nft == 0) {
            $nft = "Tout les niveaux";
        } else if ($nft == 1) {
            $nft = "Niv 1";
        } else if ($nft == 2) {
            $nft = "Niv 2";
        } else if ($nft == 3) {
            $nft = "Niv 3";
        } else {
            $nft = "Tout les niveaux";
        }

        if ($danger == 0) {
            $danger = "Tout les niveaux";
        } else if ($danger == 1) {
            $danger = "Niv 1";
        } else if ($danger == 2) {
            $danger = "Niv 2";
        } else if ($danger == 3) {
            $danger = "Niv 3";
        } else {
            $danger = "Tout les niveaux";
        }

        echo "<p>Blockchain niveaux : " . $blockchain . "</p>";
        echo "<p>Crypto     niveaux : " . $crypto . "</p>";
        echo "<p>NFT        niveaux : " . $nft . "</p>";
        echo "<p>Danger     niveaux : " . $danger . "</p>";

        ?>
    </dive>
    <div class="">
        <h2 class="" >Choisir le niveau</h2>
        <?= $this->Form->create(null, ['url' => ['controller' => 'Pages', 'action' => 'manageCookies']]) ?>
        <?= $this->Form->control('category', ['type' => 'select', 'options' => ['blockchain', 'crypto', 'nft', 'danger']]) ?>
        <?= $this->Form->control('level', ['type' => 'select', 'options' => ['Tout les niveaux', 'Niv 1', 'Niv 2', 'Niv 3']]) ?>
        <?= $this->Form->button('Définir le niveau', ['class' => 'btn btn-primary']) ?>
        <?= $this->Form->end() ?>
    </div>
</main>
<?= $this->element('footer')?>
