<body class="pt-5 bg-secondary h-100 " >
<?= $this->element('nav_admin')?>
<main class="mt-5 pt-5 h-100" >
    <div  id="update-tab-menu" class=" container h-100" >
        <a href="/users/register" class="tab text-decoration-none text-dark text-center grow" >
            <div class="my-auto">
                <h2>Ajouter un administrateur</h2>
                <?= $this->Html->image('NFT.png', ['class' => 'rounded-circle mt-3 mx-auto','alt' => 'NFT image']); ?>
            </div>

        </a>

        <a href="/users/updateactuality" class="tab text-decoration-none text-dark text-center grow" >
            <div class="my-auto">
                <h2>Ajouter des actualités</h2>
                <?= $this->Html->image('NFT.png', ['class' => 'rounded-circle mt-3 mx-auto','alt' => 'NFT image']); ?>
            </div>

        </a>

        <div class="tab text-center" >
            <h2 class="mt-3" >Modifier des actualités</h2>
            <div class="mt-3 update-tab-contenu">
                <?= $this->Html->image('NFT.png', ['class' => 'rounded-circle mt-3 mx-auto','alt' => 'NFT image']); ?>

            </div>
        </div>

        <div class="tab text-center">
            <h2 class="mt-3" >Modifier des informations</h2>
            <div class="mt-3 update-tab-contenu">
                <?= $this->Html->image('NFT.png', ['class' => 'rounded-circle mt-3 mx-auto','alt' => 'NFT image']); ?>
                <div class="d-flex" >
                    <?= $this->Html->link(
                        "Ajouter Articles",
                        ['controller'=> 'Articles', 'action' => 'add'],
                        [
                            'class' => 'text-white text-decoration-none btn btn-secondary col-5 mx-auto',
                            'escapeTitle' => false
                        ]
                    ) ?>

                    <?= $this->Html->link(
                        "Modifier Articles",
                        ['controller'=> 'Articles', 'action' => 'index'],
                        [
                            'class' => 'text-white text-decoration-none btn btn-secondary col-5 mx-auto',
                            'escapeTitle' => false
                        ]
                    ) ?>
                </div>
                

            </div>


        </div>
    </div>


</main>
</body>
