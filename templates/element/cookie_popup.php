<div id="cookie-modal-overlay">
    <div id="cookie-modal-conteneur">
        <div id="cookie-modal-header">
            <h4 id="cookie-modal-title">Politique des cookies</h4>
            <hr>
        </div>
        <div id="cookie-modal-body">
            <p>Ce site utilise des cookies pour améliorer votre expérience. Ils servent à sauvegarder votre score. En continuant à utiliser ce site, vous acceptez notre utilisation des cookies.</p>
        </div>
        <div id="cookie-modal-footer">
                <?php echo $this->Form->create(null, ['url' => ['action' => 'cookieAccept']]) ;?>
                <?= $this->Form->button(__('Accept'), ['class' => 'btn btn-warning text-white rounded-3 slideFromTop ']) ?>
                <?= $this->Form->end() ?>
                <?php echo $this->Form->create(null, ['url' => ['action' => 'cookieRefuse']]) ;?>
                <?= $this->Form->button(__('Refuse'), ['class' => 'btn btn-secondary bg-dark text-white rounded-3 slideFromTop ']) ?>
                <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    $(document).ready(function() {
        if (<?php echo $this->getRequest()->getCookie('validation'); ?> == 0) {
            document.getElementById('cookie-modal-overlay').style.display = 'block';
        }

        $('#acceptCookies').click(function() {
            document.getElementById('cookie-modal-overlay').style.display = 'none';

        });

        $('#disableCookies').click(function() {
            document.getElementById('cookie-modal-overlay').style.display = 'none';

        });
    });


</script>
