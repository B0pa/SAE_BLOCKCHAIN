<h1><?= /** @var \App\Model\Entity\Article $article */
    $article->title ?></h1>


<p>
    <?= $article->content ?>
</p>
<?= $this->Html->link(
    'Accueil',
    ['controller'=> 'Pages', 'action' => 'home'],
    [
        'class' => 'nav-link d-flex align-items-center',
        'escapeTitle' => false
    ]
) ?>

<?= $this->Html->image('upload/' . $article->image) ?>
