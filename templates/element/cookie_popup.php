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
                <?php echo $this->Form->create(null, ['url' => ['action' => 'cookieAccept']]) ;?>
                <?= $this->Form->button(__('Accept'), ['class' => 'btn btn-warning text-white rounded-3 slideFromTop ']) ?>
                <?= $this->Form->end() ?>
                <?php echo $this->Form->create(null, ['url' => ['action' => 'cookieRefuse']]) ;?>
                <?= $this->Form->button(__('Refuse'), ['class' => 'btn btn-secondary bg-dark text-white rounded-3 slideFromTop ']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

