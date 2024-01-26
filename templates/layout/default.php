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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        if (<?php echo $this->getRequest()->getCookie('validation'); ?> == 0) {
            $('#cookieModal').modal('show');
        }

        $('#acceptCookies').click(function() {

            $('#cookieModal').modal('hide');
        });

        $('#disableCookies').click(function() {

            $('#cookieModal').modal('hide');
        });
    });
</script>


</body>
</html>
