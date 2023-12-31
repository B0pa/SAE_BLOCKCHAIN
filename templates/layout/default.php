<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $this->fetch('title') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link  href="/css/style.css" rel="stylesheet">
</head>
<body>
<?php //= $this->element('nav') ?>
<div CLASS="separateur"></div>


<?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>

</body>
</html>
