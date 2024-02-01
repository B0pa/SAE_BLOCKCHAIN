<?php
$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', trim($urlPath, '/'));
$currentURL = strtolower(end($segments));
?>

<header>
    <div class="menu-toggle" id="mobile-menu">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <nav class="navbar">
        <ul>
            <li class="navbtn<?php if($currentURL==="") echo' active';?>"  ><a href="<?= $this->Url->build(['controller'=> 'Pages', 'action' => 'home']) ?>"><h4>Accueil</h4></a></li>
            <li class="navbtn <?php if($currentURL==="blockchain"||$currentURL==="nft"||$currentURL==="crypto"||$currentURL==="danger") echo' active';?>" >
                <h4 class="" >Les Infos :</h4>
                <ul class="sousmenu">
                    <li class="navbtn<?php if($currentURL==="blockchain") echo' active';?>" ><a href="<?= $this->Url->build(['controller'=> 'Articles', 'action' => 'blockchain']) ?>"><h4>Les Blockchain</h4></a></li>
                    <li class="navbtn<?php if($currentURL==="nft") echo' active';?>" ><a href="<?= $this->Url->build(['controller'=> 'Articles', 'action' => 'nft']) ?>"><h4>Les NFT</h4></a></li>
                    <li class="navbtn<?php if($currentURL==="crypto") echo' active';?>" ><a href="<?= $this->Url->build(['controller'=> 'Articles', 'action' => 'crypto']) ?>"><h4>Les Crypto</h4></a></li>
                    <li class="navbtn<?php if($currentURL==="danger") echo' active';?>" ><a href="<?= $this->Url->build(['controller'=> 'Articles', 'action' => 'danger']) ?>"><h4>Les Dangers</h4></a></li>
                </ul>
            </li>
            <li class="navbtn<?php if($currentURL==="actuality") echo' active';?>" ><a href="<?= $this->Url->build(['controller'=> 'Pages', 'action' => 'actuality']) ?>"><h4>Les Actus</h4></a></li>
            <li class="navbtn<?php if($currentURL==="tempreel") echo' active';?>" ><a href="<?= $this->Url->build(['controller'=> 'Pages', 'action' => 'tempreel']) ?>"><h4>Courbe en Temps Réel</h4></a></li>
            <li class="navbtn<?php if($currentURL==="wallet") echo' active';?>" ><a href="<?= $this->Url->build(['controller'=> 'Pages', 'action' => 'wallet']) ?>"><h4>Wallet</h4></a></li>
        </ul>
    </nav>
    <?= $this->Html->link(
        $this->Html->image('profil.png', ['alt' => 'image de profil', 'id' => 'nav-profil-img']),
        ['controller'=> 'Pages', 'action' => 'profil'],
        ['id' => 'conteneur-lien',
            'escapeTitle' => false]
    ) ?>
</header>
