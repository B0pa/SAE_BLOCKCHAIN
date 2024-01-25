<header>
    <div class="menu-toggle" id="mobile-menu">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <nav class="navbar">
        <ul>
            <li class="navbtn" ><a href="<?= $this->Url->build(['controller'=> 'Pages', 'action' => 'home']) ?>"><h2>Accueil</h2></a></li>
            <li class="navbtn" >
                <h2>Les Infos :</h2>
                <ul class="sousmenu">
                    <li class="navbtn" ><a href="<?= $this->Url->build(['controller'=> 'Articles', 'action' => 'blockchain']) ?>"><h3>Les Blockchain</h3></a></li>
                    <li class="navbtn" ><a href="<?= $this->Url->build(['controller'=> 'Articles', 'action' => 'nft']) ?>"><h3>Les NFT</h3></a></li>
                    <li class="navbtn" ><a href="<?= $this->Url->build(['controller'=> 'Articles', 'action' => 'crypto']) ?>"><h3>Les Crypto</h3></a></li>
                    <li class="navbtn" ><a href="<?= $this->Url->build(['controller'=> 'Articles', 'action' => 'danger']) ?>"><h3>Les Dangers</h3></a></li>
                </ul>
            </li>
            <li class="navbtn" ><a href="<?= $this->Url->build(['controller'=> 'Pages', 'action' => 'actuality']) ?>"><h2>Les Actus</h2></a></li>
            <li class="navbtn" ><a href="<?= $this->Url->build(['controller'=> 'Pages', 'action' => 'tempreel']) ?>"><h2>Courbe en Temps Réel</h2></a></li>
            <li class="navbtn" ><a href="<?= $this->Url->build(['controller'=> 'Pages', 'action' => 'wallet']) ?>"><h2>Wallet</h2></a></li>
        </ul>
    </nav>
    <?= $this->Html->link(
        $this->Html->image('profil.png', ['alt' => 'image de profil', 'id' => 'nav-profil-img']),
        ['controller'=> 'Pages', 'action' => 'profil'],
        ['id' => 'conteneur-lien',
            'escapeTitle' => false]
    ) ?>
</header> 
