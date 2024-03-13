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
            <li class="navbtn" ><?php echo $this->Html->link('<h4>Accueil</h4>', ['controller'=> 'Pages', 'action' => 'home'], ['class' => 'navbtn' . ($currentURL === "" ? ' active' : ''), 'escapeTitle' => false]);?></li>
            <li class="navbtn <?php if($currentURL==="blockchain"||$currentURL==="nft"||$currentURL==="crypto"||$currentURL==="danger") echo' active';?>" >
                <h4 class="" >Les Infos :</h4>
                <ul class="sousmenu">
                    <li class="navbtn" ><?php echo $this->Html->link('<h4>La Blockchain </h4>', ['controller'=> 'Articles', 'action' => 'blockchain'], ['class'=>($currentURL === "blockchain" ? ' active' : ''), 'escapeTitle' => false]);?></li>
                    <li class="navbtn" ><?php echo $this->Html->link('<h4>Les NFT</h4>', ['controller'=> 'Articles', 'action' => 'nft'], ['class'=>($currentURL === "nft" ? ' active' : ''), 'escapeTitle' => false]);?></li>
                    <li class="navbtn" ><?php echo $this->Html->link('<h4>Les Crypto</h4>', ['controller'=> 'Articles', 'action' => 'crypto'], ['class'=>($currentURL === "crypto" ? ' active' : ''), 'escapeTitle' => false]);?></li>
                    <li class="navbtn" ><?php echo $this->Html->link('<h4>Les Dangers</h4>', ['controller'=> 'Articles', 'action' => 'danger'], ['class'=>($currentURL === "danger" ? ' active' : ''), 'escapeTitle' => false]);?></li>
                </ul>
            </li>
            <li class="navbtn <?php if($currentURL==="blockchain"||$currentURL==="nft"||$currentURL==="crypto"||$currentURL==="danger") echo' active';?>" >
                <h4 class="" >Les Quiz :</h4>
                <ul class="sousmenu">
                    <li class="navbtn" ><?php echo $this->Html->link('<h4>Quiz Blockchain </h4>', ['controller'=> 'Quizzes', 'action' => 'quizz_blockchain'], ['class'=>($currentURL === "quizz_blockchain" ? ' active' : ''), 'escapeTitle' => false]);?></li>
                    <li class="navbtn" ><?php echo $this->Html->link('<h4>Quiz NFT</h4>', ['controller'=> 'Quizzes', 'action' => 'quizz_n_f_t'], ['class'=>($currentURL === "quizz_n_f_t" ? ' active' : ''), 'escapeTitle' => false]);?></li>
                    <li class="navbtn" ><?php echo $this->Html->link('<h4>Quiz Crypto</h4>', ['controller'=> 'Quizzes', 'action' => 'quizzcrypto'], ['class'=>($currentURL === "quizzcrypto" ? ' active' : ''), 'escapeTitle' => false]);?></li>
                    <li class="navbtn" ><?php echo $this->Html->link('<h4>Quiz Dangers</h4>', ['controller'=> 'Quizzes', 'action' => 'quizz_danger'], ['class'=>($currentURL === "quizz_danger" ? ' active' : ''), 'escapeTitle' => false]);?></li>
                </ul>
            </li>
            <li class="navbtn" ><?php echo $this->Html->link('<h4>Les Actu</h4>', ['controller'=> 'Actualities', 'action' => 'actuality'], ['class' => 'navbtn' . ($currentURL === "actuality" ? ' active' : ''), 'escapeTitle' => false]);?></li>
            <li class="navbtn" ><?php echo $this->Html->link('<h4>Courbes en Temps Réel</h4>', ['controller'=> 'Pages', 'action' => 'tempreel'], ['class' => 'navbtn' . ($currentURL === "tempreel" ? ' active' : ''), 'escapeTitle' => false]);?></li>

            <li class="navbtn" ><?php echo $this->Html->link('<h4>Wallet</h4>', ['controller'=> 'Pages', 'action' => 'wallet'], ['class' => 'navbtn' . ($currentURL === "wallet" ? ' active' : ''), 'escapeTitle' => false]);?></li>

            <?php
            if ($loggedIn):
                ?>
                <li class="navbtn" ><?php echo $this->Html->link('<h4>Admin</h4>', ['controller'=> 'Users', 'action' => 'update'], ['class' => 'navbtn' . ($currentURL === "users" ||$currentURL === "update" || $currentURL === "articles" || $currentURL === "actualities" || $currentURL === "quizzes" || $currentURL === "register" || $currentURL == "add" ? ' active' : ''), 'escapeTitle' => false]);?></li>
            <?php
            endif; ?>
        </ul>
    </nav>
    <div id="nav-conteneur-lien" >
        <?php
            if ($loggedIn):
            echo $this->Html->link(
                $this->Html->image('logout.png', ['alt' => 'image de profil', 'class' => 'nav-profil-img']),
                ['controller'=> 'Users', 'action' => 'logout'],
                ['class' => 'conteneur-lien', 'escapeTitle' => false]
            );
            endif;

            $class = ($currentURL === "profil") ? 'active' : '';
            echo $this->Html->link(
                $this->Html->image('profil.png', ['alt' => 'image de profil','class' => 'nav-profil-img ' . $class]),
                ['controller'=> 'Pages', 'action' => 'profil'],
                ['escapeTitle' => false, 'class' => 'conteneur-lien ' . $class]
            );
        ?>
    </div>
    
</header>
