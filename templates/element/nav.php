<?php
$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', trim($urlPath, '/'));
$currentURL = strtolower(end($segments));

$identity = $this->Authentication->getIdentity();
$loggedIn = $this->Authentication->isLoggedIn();


?>

<header>
    <div class="menu-toggle" id="mobile-menu">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <nav class="navbar">
        <ul>
            <li class="navbtn" ><?php echo $this->Html->link('<h4>Acceuil</h4>', ['controller'=> 'Pages', 'action' => 'home'], ['class' => 'navbtn' . ($currentURL === "" ? ' active' : ''), 'escapeTitle' => false]);?></li>
            <li class="navbtn <?php if($currentURL==="blockchain"||$currentURL==="nft"||$currentURL==="crypto"||$currentURL==="danger") echo' active';?>" >
                <h4 class="" >Les Infos :</h4>
                <ul class="sousmenu">
                    <li class="navbtn" ><?php echo $this->Html->link('<h4>La Blockchain </h4>', ['controller'=> 'Articles', 'action' => 'blockchain'], [($currentURL === "blockchain" ? ' active' : ''), 'escapeTitle' => false]);?></li>
                    <li class="navbtn" ><?php echo $this->Html->link('<h4>Les NFT</h4>', ['controller'=> 'Articles', 'action' => 'nft'], [($currentURL === "nft" ? ' active' : ''), 'escapeTitle' => false]);?></li>
                    <li class="navbtn" ><?php echo $this->Html->link('<h4>Les Crypto</h4>', ['controller'=> 'Articles', 'action' => 'crypto'], [($currentURL === "crypto" ? ' active' : ''), 'escapeTitle' => false]);?></li>
                    <li class="navbtn" ><?php echo $this->Html->link('<h4>Les Dangers</h4>', ['controller'=> 'Articles', 'action' => 'danger'], [($currentURL === "danger" ? ' active' : ''), 'escapeTitle' => false]);?></li>
                </ul>
            </li>
            <li class="navbtn" ><?php echo $this->Html->link('<h4>Les Actu</h4>', ['controller'=> 'Actualities', 'action' => 'actuality'], ['class' => 'navbtn' . ($currentURL === "actuality" ? ' active' : ''), 'escapeTitle' => false]);?></li>
            <li class="navbtn" ><?php echo $this->Html->link('<h4>Courbe en Temps Réel</h4>', ['controller'=> 'Pages', 'action' => 'tempreel'], ['class' => 'navbtn' . ($currentURL === "tempreel" ? ' active' : ''), 'escapeTitle' => false]);?></li>

            <li class="navbtn" ><?php echo $this->Html->link('<h4>Wallet</h4>', ['controller'=> 'Pages', 'action' => 'wallet'], ['class' => 'navbtn' . ($currentURL === "wallet" ? ' active' : ''), 'escapeTitle' => false]);?></li>

            <?php
            if ($loggedIn):
                ?>

                <li class="navbtn" ><?php echo $this->Html->link('<h4>Admin</h4>', ['controller'=> 'Users', 'action' => 'update'], ['class' => 'navbtn' . ($currentURL === "update" ? ' active' : ''), 'escapeTitle' => false]);?></li>
                <li class="navbtn" ><?php echo $this->Html->link('<h4>Logout</h4>', ['controller'=> 'Users', 'action' => 'logout'], ['class' => 'navbtn' . ($currentURL === "logout" ? ' active' : ''), 'escapeTitle' => false]);?></li>

            <?php
            endif; ?>
        </ul>
    </nav>


    <?php
    $class = ($currentURL === "profil") ? 'active' : '';
    echo $this->Html->link(
        $this->Html->image('profil.png', ['alt' => 'image de profil', 'id' => 'nav-profil-img', 'class' => $class]),
        ['controller'=> 'Pages', 'action' => 'profil'],
        ['id' => 'conteneur-lien', 'escapeTitle' => false, 'class' => $class]
    );
    ?>
</header>
