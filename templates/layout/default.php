<!-- src/Template/Layout/default.ctp -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $this->fetch('title') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<!-- Vérification de la connexion à la base de données -->
<?php
// Importez le composant Database
use App\Controller\Component\DatabaseComponent;

// Instanciez le composant
$databaseComponent = new DatabaseComponent();

// Vérifie la connexion à la base de données à chaque chargement de page
if ($databaseComponent->checkConnection()) {
    echo '<div class="alert alert-success">Connexion à la base de données réussie!</div>';
} else {
    echo '<div class="alert alert-danger">La connexion à la base de données a échoué.</div>';
}
?>

<!-- Le reste du code de votre mise en page par défaut -->
<?= $this->element('nav') ?>
<div class="separateur"></div>
<?= $this->fetch('content') ?>

</body>
</html>
