
<?php
/** @var \App\Model\Entity\Actuality[] $actus */
foreach ($actus as $actu) :
    ?>
    <div class='d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3 slideFromTop' >

        <h2 class="h2 text-center mt-1 p-2" ><?= $actu->title ?></h2>
        <?= $this->Html->image("upload/" . $actu->img, ['class' => 'd-flex img-fluid w-75 mx-auto rounded-3 mt-2 mb-3','alt' => 'image','style' => ''])?>
        <a href=<?= $actu->link?>><?= $actu->title ?></a>
        <p class="d-flex p-2 col-10 mx-auto" style="text-align: justify;" ><?= $actu->content?></p>
    </div>
<?php
endforeach;
?>

<main>
    <div>
        <h2>titre</h2>

        <?= $this->Html->image('ex.png', ['alt' => 'NFT image']); ?>

    </div>
</main>


