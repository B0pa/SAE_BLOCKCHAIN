<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $this->fetch('title') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="/css/style.css" rel="stylesheet">
</head>
<body>
<?php //= $this->element('nav') ?>
<div CLASS="separateur"></div>


<?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>

</body>
</html>
