<?php $urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', trim($urlPath, '/'));
$currentURL = strtolower(end($segments));
$pageTitle = 'Erreur'; // Valeur par défaut
$crypto = '';
$nb = '';


// Définissez les titres de page en fonction de l'URL
switch ($currentURL) {
    case '':
        $pageTitle = 'Accueil';
        break;
    case 'explication':
        $pageTitle = 'Explication';
        break;
    case 'actualite':
        $pageTitle = 'Actualité';
        break;
    case 'nft':
        $pageTitle = 'NFT';
        break;
    case 'danger':
        $pageTitle = 'Danger';
        break;
    case 'crypto':
        $pageTitle = 'Cryptomonnaies';
        break;
    case 'blockchain':
        $pageTitle = 'Blockchain';
        break;
    case 'tempreel':
        $pageTitle = 'Temps Réel';
        break;
    case 'wallet':
        $pageTitle = 'Wallet';
        break;
    case 'actuality':
        $pageTitle = 'Actualités';
        break;
    case 'quizz-blockchain':
        $pageTitle = 'Quiz Blockchain';
        $crypto = 'cryptoblockchain.png';
        $nb = $this->getRequest()->getCookie('blockchain');
        break;
    case 'quizz-danger':
        $crypto = 'cryptodanger.png';
        $pageTitle = 'Quiz Danger';
        $nb = $this->getRequest()->getCookie('danger');
        break;
    case 'quizzcrypto':
        $crypto = 'cryptobitcoin.png';
        $pageTitle = 'Quiz Crypto';
        $nb = $this->getRequest()->getCookie('crypto');
        break;
    case 'quizz-n-f-t':
        $crypto = 'cryptoNFT.png';
        $pageTitle = 'Quiz NFT';
        $nb = $this->getRequest()->getCookie('nft');
        break;
    case 'search':
        $query = $_GET['query'] ?? 'Recherche';
        $pageTitle = 'Recherche : ' . $query;
        break;
    default:
        $pageTitle = 'Erreur';
        break;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['style']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<?= $this->element('nav')?>
<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>

<?=$this->element('footer')?>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>

    document.getElementById('mobile-menu').addEventListener('click', function() {
        document.querySelector('.navbar').classList.toggle('show');
        this.classList.toggle('cross');
    });

</script>
