<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danger</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-secondary">
<?= $this->element('nav')?>
<main  class="mt-5 pt-5 d-flex flex-column min-vh-100">

    <?= $this->Html->image('danger.png', ['class' => 'rounded-circle mt-3 mx-auto','alt' => 'NFT image']); ?>

    <div class="p-5">
        <p class="text-justify text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, sunt ab? Repudiandae quisquam officia laudantium! Quo nobis nam officiis laudantium ipsa vel ipsum omnis, harum a odit laborum reiciendis repellat!
        Culpa neque molestiae, possimus est debitis obcaecati aut cumque eligendi animi iure eaque necessitatibus vitae corrupti accusamus tenetur assumenda quam? Accusamus sunt aperiam cupiditate sequi doloribus voluptas deserunt adipisci porro.
        Veritatis, dolor tempora temporibus laboriosam dolores sunt. Et, animi laboriosam. Quis velit fugit consequuntur hic reprehenderit quasi, sit, ea a inventore ad nobis cumque nulla numquam incidunt porro voluptate illo?
        Delectus, nemo aliquam quam ipsum consectetur quis sed rem ipsam maiores modi hic, molestiae obcaecati pariatur necessitatibus praesentium minima, alias repellendus atque. Voluptates aspernatur quisquam quo, ut quam id non.
        Officia, assumenda, quibusdam natus explicabo nisi saepe voluptatem sit blanditiis ex earum totam non dolorem iste excepturi, ullam distinctio vero praesentium aliquam! Non repellendus omnis perferendis beatae quidem dolore autem?</p>
    </div>

    <div class="btn btn-dark align-self-end me-5 col-1" >
        <a href="/pages/quizzDanger"  class="text-white text-decoration-none" >Quiz</a>
    </div>
</main>

<?= $this->element('footer')?>

</body>
</html>
