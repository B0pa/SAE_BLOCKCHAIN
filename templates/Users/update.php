<main id="update-main" class="navmarge" >
    <div class="tab text-decoration-none text-dark text-center" >
        <h2>Ajouter un administrateur</h2>
        <div class="update-tab-liens">
            <?= $this->Html->link(
                "Ajouter administrateur",
                ['controller'=> 'Users', 'action' => 'register'],
                [
                    'class' => 'text-white text-decoration-none btn btn-secondary align-self-end col-* px-2 m-3',
                    'escapeTitle' => false
                ]
            ) ?>
            <?= $this->Html->image('administrator.png', ['class' => 'img-fluid h-100','alt' => 'NFT image', 'style' => 'max-height: 100%;' ]); ?>
            <?= $this->Html->link(
                "Supprimer administrateur",
                ['controller'=> 'Users', 'action' => 'index'],
                [
                    'class' => 'text-white text-decoration-none btn btn-secondary align-self-end col-* px-2 m-3',
                    'escapeTitle' => false
                ]
            ) ?>
        </div>
    </div>

    <div class="tab text-center" >
        <h2 class="mt-3" >Modifier des Actualités</h2>
        <div class="update-tab-liens" >
            <?= $this->Html->link(
                "Ajouter Actualité",
                ['controller'=> 'Actualities', 'action' => 'add'],
                [
                    'class' => 'text-white text-decoration-none btn btn-secondary align-self-end col-* px-2 m-3',
                    'escapeTitle' => false
                ]
            ) ?>
            <?= $this->Html->image('actualite.png', ['class' => 'img-fluid h-100','alt' => 'NFT image', 'style' => 'max-height: 100%;' ]); ?>
            <?= $this->Html->link(
                "Modifier Actualité",
                ['controller'=> 'Actualities', 'action' => 'index'],
                [
                    'class' => 'text-white text-decoration-none btn btn-secondary align-self-end col-* px-2 m-3',
                    'escapeTitle' => false
                ]
            ) ?>
        </div>
    </div>


    <div class="tab text-center" >
        <h2 class="mt-3" >Modifier des Quiz</h2>
        <div class="update-tab-liens" >
            <?= $this->Html->link(
                "Ajouter Quiz",
                ['controller'=> 'Quizzes', 'action' => 'add'],
                [
                    'class' => 'text-white text-decoration-none btn btn-secondary align-self-end col-* px-2 m-3',
                    'escapeTitle' => false
                ]
            ) ?>
            <?= $this->Html->image('quizicon.png', ['class' => 'img-fluid h-100','alt' => 'NFT image', 'style' => 'max-height: 100%;' ]); ?>

            <?= $this->Html->link(
                "Modifier Quiz",
                ['controller'=> 'Quizzes', 'action' => 'index'],
                [
                    'class' => 'text-white text-decoration-none btn btn-secondary align-self-end col-* px-2 m-3',
                    'escapeTitle' => false
                ]
            ) ?>
        </div>
    </div>

    <div class="tab text-center">
        <h2 class="mt-3" >Modifier des informations</h2>
        <div class="update-tab-liens" >
            <?= $this->Html->link(
                "Ajouter Articles",
                ['controller'=> 'Articles', 'action' => 'add'],
                [
                    'class' => 'text-white text-decoration-none btn btn-secondary align-self-end col-* px-2 m-3',
                    'escapeTitle' => false
                ]
            ) ?>
            <?= $this->Html->image('explication.png', ['class' => 'img-fluid h-100','alt' => 'NFT image', 'style' => 'max-height: 100%;' ]); ?>

            <?= $this->Html->link(
                "Modifier Articles",
                ['controller'=> 'Articles', 'action' => 'index'],
                [
                    'class' => 'text-white text-decoration-none btn btn-secondary align-self-end col-* px-2 m-3',
                    'escapeTitle' => false
                ]
            ) ?>
        </div>
    </div>
</main>
