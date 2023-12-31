<body class="pt-5 bg-secondary h-100 " >
<?= $this->element('nav_admin')?>
<main class="mt-5 pt-5 h-100" >
    <div  id="update-tab-menu" class=" container h-100" >
        <a href="/users/register" class="tab text-decoration-none text-dark text-center grow" >
            <div class="my-auto">
                <h2>Ajouter un administrateur</h2>
                <?= $this->Html->image('administrator.png', ['class' => 'img-fluid w-50 mt-3 mx-auto','alt' => 'NFT image']); ?>
            </div>

        </a>

        <div class="tab text-center" >
            <h2 class="mt-3" >Modifier des Actualité</h2>
            <div class="mt-3 update-tab-contenu">
                <?= $this->Html->image('actualite.png', ['class' => 'img-fluid w-50 mt-3 mx-auto','alt' => 'NFT image']); ?>
                <div class="d-flex justify-content-around  " >
                    <?= $this->Html->link(
                        "Ajouter Actualité",
                        ['controller'=> 'Actualities', 'action' => 'add'],
                        [
                            'class' => 'text-white text-decoration-none btn btn-secondary align-self-end col-* px-4 m-3',
                            'escapeTitle' => false
                        ]
                    ) ?>

                    <?= $this->Html->link(
                        "Modifier Actualité",
                        ['controller'=> 'Actualities', 'action' => 'index'],
                        [
                            'class' => 'text-white text-decoration-none btn btn-secondary align-self-end col-* px-4 m-3',
                            'escapeTitle' => false
                        ]
                    ) ?>
                </div>
            </div>
        </div>

        <div class="tab text-center" >
            <h2 class="mt-3" >Modifier des Quiz</h2>
            <div class="mt-3 update-tab-contenu">
                <?= $this->Html->image('quiz.png', ['class' => 'img-fluid w-50 mt-3 mx-auto','alt' => 'NFT image']); ?>
                <div class="d-flex justify-content-around  " >
                    <?= $this->Html->link(
                        "Ajouter Quiz",
                        ['controller'=> 'Quiz', 'action' => 'add'],
                        [
                            'class' => 'text-white text-decoration-none btn btn-secondary align-self-end col-* px-4 m-3',
                            'escapeTitle' => false
                        ]
                    ) ?>

                    <?= $this->Html->link(
                        "Modifier Quiz",
                        ['controller'=> 'Quiz', 'action' => 'index'],
                        [
                            'class' => 'text-white text-decoration-none btn btn-secondary align-self-end col-* px-4 m-3',
                            'escapeTitle' => false
                        ]
                    ) ?>
                </div>
            </div>
        </div>

        <div class="tab text-center">
            <h2 class="mt-3" >Modifier des informations</h2>
            <div class="mt-3 update-tab-contenu">
                <?= $this->Html->image('explication.png', ['class' => 'img-fluid w-50 mt-3 mx-auto','alt' => 'NFT image']); ?>
                <div class="d-flex justify-content-around  " >
                    <?= $this->Html->link(
                        "Ajouter Articles",
                        ['controller'=> 'Articles', 'action' => 'add'],
                        [
                            'class' => 'text-white text-decoration-none btn btn-secondary align-self-end col-* px-4 m-3',
                            'escapeTitle' => false
                        ]
                    ) ?>

                    <?= $this->Html->link(
                        "Modifier Articles",
                        ['controller'=> 'Articles', 'action' => 'index'],
                        [
                            'class' => 'text-white text-decoration-none btn btn-secondary align-self-end col-* px-4 m-3',
                            'escapeTitle' => false
                        ]
                    ) ?>
                </div>


            </div>


        </div>
    </div>


</main>
</body>
