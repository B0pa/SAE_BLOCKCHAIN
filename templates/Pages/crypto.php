<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cryptomonnaies</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-secondary">
<?= $this->element('nav')?>
<main class="mt-5 pt-5 d-flex flex-column min-vh-100">

    <?= $this->Html->image('crypto.png', ['class' => 'rounded-circle mt-3 mx-auto','alt' => 'NFT image']); ?>

    <div class="p-5">
        <p class="text-justify text-center" >Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati deserunt culpa voluptatum. Alias reprehenderit hic nostrum similique, dignissimos praesentium! Vel repudiandae ea recusandae neque odio illo eos hic ipsum error.
            Obcaecati, similique quibusdam delectus vitae exercitationem, et natus quasi nesciunt minus iste, at necessitatibus libero dolores ipsum modi provident veniam. Dolorum nihil corrupti reprehenderit iusto fuga quos nam perferendis eligendi!</p>
    </div>
        <a href="/pages/quizzcrypto" class="text-white text-decoration-none btn btn-dark align-self-end me-5 col-1" >Quiz</a>

</main>

<?= $this->element('footer')?>

</body>
</html>
