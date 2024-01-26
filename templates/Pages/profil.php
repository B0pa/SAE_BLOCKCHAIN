
<!DOCTYPE html>
<html lang="en-FR">
<head>
    <meta charset="UTF-8">
    <title>Gérer les cookies</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg-secondary">
<?= $this->element('nav2')?>
<main class="pt-5 mt-5" >
    <div class="d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3 slideFromTop">
        <h2 class="text-center bg-warning p-2 rounded-pill text-dark" >Supprimer les cookies</h2>
        <p>Êtes-vous sûr de vouloir supprimer tous les cookies ?</p>
        <?= $this->Html->link('Supprimer tous les cookies', ['controller' => 'Pages', 'action' => 'deleteAllCookies'], ['class' => 'btn btn-danger']) ?>
    </div>

    <div class="d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3 slideFromTop">
        <h2 class="text-center bg-warning p-2 rounded-pill text-dark" >Choisir le niveau</h2>
        <?= $this->Form->create(null, ['url' => ['controller' => 'Pages', 'action' => 'manageCookies']]) ?>
        <?= $this->Form->control('level', ['type' => 'select', 'options' => ['Niv 1', 'Niv 2', 'Niv 3'], 'empty' => 'Choisir un niveau']) ?>
        <?= $this->Form->button('Définir le niveau', ['class' => 'btn btn-primary']) ?>
        <?= $this->Form->end() ?>
    </div>
</main>
<?= $this->element('footer')?>
</body>
</html>
