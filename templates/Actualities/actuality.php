<?= $this->element('nav')?>
<main class="mt-5">

    <div class="modal fade" id="cookieModal" tabindex="-1" aria-labelledby="cookieModalLabel" aria-hidden="true">
        <div class="modal-dialog text-white">
            <div class="modal-content bg-secondary border-3 border-dark">
                <div class="modal-header border-dark">
                    <h5 class="modal-title" id="cookieModalLabel">Politique des cookies</h5>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Ce site utilise des cookies pour améliorer votre expérience. Ils servent à sauvegarder votre score. En continuant à utiliser ce site, vous acceptez notre utilisation des cookies.
                </div>
                <div class="modal-footer border-dark">
                    <?php echo $this->Form->create(null, ['url' => ['controller' => 'Pages','action' => 'cookieAccept']]) ;?>
                    <?= $this->Form->button(__('Accept'), ['class' => 'btn btn-warning text-white rounded-3 slideFromTop ']) ?>
                    <?= $this->Form->end() ?>
                    <?php echo $this->Form->create(null, ['url' => ['controller' => 'Pages','action' => 'cookieRefuse']]) ;?>
                    <?= $this->Form->button(__('Refuse'), ['class' => 'btn btn-secondary bg-dark text-white rounded-3 slideFromTop ']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>


    <div>
        <div class="d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-5 rounded-3 slideFromTop" >
            <h3 class="h3 text-center">Quelques liens de médias mis a jour régulièrement que nous trouvons intéressants</h3>
            <p class="text-center" >La dernière vidéo de Hasheur:</p>
            <iframe
                src="https://www.youtube-nocookie.com/embed?listType=playlist&list=UULFhlTcWDE8gd4tsl_L727NrQ"
                width="75%"
                height="400"
                allowfullscreen class="mx-auto">
            </iframe>
        </div>
        <?php
        /** @var \App\Model\Entity\Actuality[] $actus */
        foreach ($actus as $actu) :
            ?>
            <div class='d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-5 rounded-3 slideFromTop' >

                <h2 class="h2 text-center mt-1 p-2" ><?= $actu->title ?></h2>
                <?= $this->Html->image("upload/" . $actu->img, ['class' => 'd-flex img-fluid w-75 mx-auto rounded-3 mt-2 mb-3','alt' => 'image','style' => ''])?>
                <a class="text-center" href=<?= $actu->link?>><?= $actu->title ?></a>
                <p class="d-flex p-2 col-10 mx-auto" style="text-align: justify;" ><?= $actu->content?></p>
            </div>
        <?php
        endforeach;
        ?>
    </div>
</main>
<?= $this->element('footer')?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        if (<?php echo $this->getRequest()->getCookie('validation'); ?> == 0) {
            $('#cookieModal').modal('show');
        }

        $('#acceptCookies').click(function() {

            $('#cookieModal').modal('hide');
        });

        $('#disableCookies').click(function() {

            $('#cookieModal').modal('hide');
        });
    });
</script>

