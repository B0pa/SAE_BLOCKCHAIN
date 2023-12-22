<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body class="bg-secondary pt-5" >
<?= $this->element('nav_admin')?>
<main class="mt-5 pt-3 " >
    <div class="row col-12 p-3">
        <aside class="col">
            <div class="side-nav">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Html->link(__('List Articles'), ['action' => 'index'], ['class' => 'side-nav-item text-warning']) ?>
            </div>
        </aside>
        <div class="col-9 p-3 bg-dark rounded text-white">
            <div class="articles content">
                <?= $this->Form->create($article, ['type' => 'file']) ?>
                <fieldset>
                    <legend class="" ><?= __('Add Article') ?></legend>
                    <?php
                    echo $this->Form->button('Modifier le CSS du titre', ['type' => 'button', 'class' => 'btn btn-secondary mt-3', 'id' => 'edit-content-btn', 'data-target' => '#css_title']);
                    echo $this->Form->text('css_title', ['style' => 'display: none;', 'class' => 'form-control bg-secondary', 'id' => 'css_title']);

                    echo $this->Form->control('title', [
                        'class' => 'form-control bg-secondary'
                    ]);

                    echo $this->Form->button('Modifier le CSS du contenu', ['type' => 'button', 'class' => 'btn btn-secondary mt-3', 'id' => 'edit-content-btn', 'data-target' => '#css_content']);
                    echo $this->Form->text('css_content', ['style' => 'display: none;', 'class' => 'form-control bg-secondary', 'id' => 'css_content']);


                    echo $this->Form->button('Gras', ['type' => 'button', 'class' => 'btn btn-secondary mt-3', 'id' => 'boldButton']);
                    echo $this->Form->button('Souligner', ['type' => 'button', 'class' => 'btn btn-secondary mt-3', 'id' => 'underlineButton']);
                    echo $this->Form->control('content',[
                        'class' => 'form-control bg-secondary'
                    ]);

                    echo $this->Form->control('level', ['class' => 'form-control bg-secondary', 'options' => [1 => 1, 2 => 2, 3 => 3]]);
                    echo $this->Form->control('category',['class' => 'form-control bg-secondary','options' => ['blockchain' => 'Blockchain', 'danger' => 'Danger', 'nft' => 'NFT', 'crypto' => 'Crypto']] );

                    echo $this->Form->button("Modifier le CSS de l'image ", ['type' => 'button', 'class' => 'btn btn-secondary mt-3', 'id' => 'edit-content-btn', 'data-target' => '#css_img']);
                    echo $this->Form->text('css_img', ['style' => 'display: none;', 'class' => 'form-control bg-secondary', 'id' => 'css_img']);

                    echo $this->Form->control('upload', [
                        'type' => 'file',
                        'label' => 'Votre jolie image',
                        'class' => 'form-control bg-secondary',
                        'after' => $this->Form->button('Modifier l\'image', ['type' => 'button', 'class' => 'btn btn-secondary mt-3', 'id' => 'edit-upload-btn', 'data-target' => '#upload-input']),
                    ]);
                    ?>


                </fieldset>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-secondary mt-3']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</main>
<aside>
    <div class="side-nav">
        <div class="articles content">
            <div class="d-flex flex-column bg-dark text-white col-10 mx-auto my-4 p-3 rounded-3 slideFromTop">
                <h2 id="preview-title" style="text-align: center;padding:5px;"></h2>
                <p  id="preview-text" style="overflow-wrap: anywhere;padding:5px;text-align: justify;"></p>
                <div id="imagePreview" style="padding:20px;"></div>
            </div>
        </div>
    </div>
</aside>
</body>
<script>
    $(function() {
        // Prévisualisation

        $('button').click(function() {
            // Obtenez l'identifiant de la zone de texte à afficher
            var target = $(this).data('target');

            // Affichez la zone de texte
            $(target).show();
        });

        // Lorsque le champ title-input change
        $('#css_title').on('input', function() {
            // Obtenez la classe Bootstrap entrée par l'utilisateur
            var bootstrapClass = $(this).val();

            // Appliquez la classe Bootstrap à l'élément de titre
            $('#preview-title').attr('class', bootstrapClass);
        });

        $('#css_content').on('input', function() {
            // Obtenez la classe Bootstrap entrée par l'utilisateur
            var bootstrapClass = $(this).val();

            // Appliquez la classe Bootstrap à l'élément de titre
            $('#preview-text').attr('class', bootstrapClass);
        });

        $('#css_img').on('input', function() {
            // Obtenez la classe Bootstrap entrée par l'utilisateur
            var bootstrapClass = $(this).val();

            // Appliquez la classe Bootstrap à l'image elle-même
            $('#imagePreview img').attr('class', bootstrapClass);
        });



        $('textarea[name="content"]').on('input', function() {
            var content = $(this).val().replace(/ /g, "&nbsp;").replace(/\n/g, "<br>");
            $('#preview-text').html(content);
        });
        $('input[name="title"]').on('input', function() {
            $('#preview-title').text($(this).val());
        });
        $('input[name="upload"]').on('change', function() {
            $('#imagePreview').html('');
            var total_file = document.getElementById("upload").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#imagePreview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' class='img-fluid w-75 mx-auto rounded-3 mt-2 mb-3' alt='accueil' style=''>");
            }
        });
        $('#boldButton').on('click', function() {
            wrapSelection('content', '<strong>', '</strong>');
        });

        $('#underlineButton').on('click', function() {
            wrapSelection('content', '<u>', '</u>');
        });

        function wrapSelection(textareaId, openTag, closeTag) {
            var textarea = document.getElementById(textareaId);
            var start = textarea.selectionStart;
            var end = textarea.selectionEnd;
            var selectedText = textarea.value.substring(start, end);
            var newText = openTag + selectedText + closeTag;
            textarea.value = textarea.value.substring(0, start) + newText + textarea.value.substring(end);
            // Mettre à jour la prévisualisation
            $('#preview-text').html(textarea.value.replace(/\n/g, "<br>"));
        }
    });
</script>
