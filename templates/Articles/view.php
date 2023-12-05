<body class="mt-5 pt-5 bg-secondary" >
    <?= $this->element('nav_admin')?>
    <main class="pt-3 p-3" >
        <?= $this->Html->link(
            'Return',
            ['controller'=> 'Pages', 'action' => 'home'],
            [
                'class' => 'btn btn-warning ',
                'escapeTitle' => false
            ]
        ) ?>
        <div class="d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-2 rounded-3 slideFromTop" >
            
            <h2 class="h2 text-center mt-1 p-2" ><?= /** @var \App\Model\Entity\Article $article */
            $article->title ?></h2>

            <p class="d-flex p-2 col-10 mx-auto" style="text-align: justify;" >
                <?= $article->content ?>
            </p>
            <?= $this->Html->image('upload/' . $article->image, ['class' => 'd-flex img-fluid w-75 mx-auto rounded-3 mt-2 mb-3','alt' => 'accueil','style' => '']) ?>
        </div>
        
    </main>
</body>


