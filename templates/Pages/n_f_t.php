<?php
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NFT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-secondary">
<?= $this->element('nav')?>
<main class="mt-5 pt-5 d-flex flex-column min-vh-100">

    <?= $this->Html->image('NFT.png', ['class' => 'rounded-circle mt-3 mx-auto','alt' => 'NFT image']); ?>

    <div class="p-5">
        <p class="text-justify text-center" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis quisquam corporis dolorem facere illo qui error ullam harum, dolore vel nihil accusamus quia eius ipsum sed illum voluptatibus? Distinctio, velit!
            Vitae ullam tempore quos placeat enim consequatur quaerat, at totam eaque nihil unde ipsam non voluptates suscipit consectetur. Libero sunt molestiae beatae consectetur ea at repellat amet saepe quae eveniet?
            Accusantium eius est optio tempora ab deleniti rem facere corporis aliquid minus. Ut repellendus molestiae eveniet fugiat sunt veritatis sapiente vero maxime ipsam et, fuga voluptatum doloribus, eius cum quaerat.
            Fuga ducimus dolores, aliquam at iste voluptatibus libero aperiam excepturi cumque error quas maxime quam optio nihil? Saepe dignissimos ipsum qui iste sed, corrupti pariatur? Nemo corporis velit illum odit.
            Rerum quasi totam necessitatibus voluptatum corrupti id quaerat iure sit temporibus. Quos aliquid unde, dolorem repellendus omnis dicta sequi error iusto non a veniam cumque, harum consequatur dolor atque quibusdam?</p>
    </div>
    <div class="btn btn-dark align-self-end me-5 col-1" >
        <a href="/pages/quizzNFT" class="text-white text-decoration-none" >quizz</a>
    </div>

</main>

<?= $this->element('footer')?>

</body>
</html>
