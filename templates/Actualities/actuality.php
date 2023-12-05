
<?php
$this->assign('title', 'Actualités');
/** @var \App\Model\Entity\Actuality[] $actualites */
foreach ($actualites as $actualite) :
    ?>
    <p><?= $actualite->level?></p>
    <h2><?= $actualite->title ?></h2>
    <p><?= $actualite->content?></p>
    <?= $this->Html->image("upload/" . $actualite->image)?>

<?php
endforeach;
?>
?>
<main>
    <div>
        <h2>titre</h2>
        <?= $this->Html->image('ex.png', ['alt' => 'NFT image']); ?>

    </div>
</main>


