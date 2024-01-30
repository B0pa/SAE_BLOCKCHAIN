<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>

<?= $this->element('nav_admin')?>
<main class="mt-5 pt-3 col col-12" >
    <div class="d-flex col col-12">
        <div class="text-center col col-6">
            <h2 class="heading"><?= __('Actions') ?></h2>
            <?= $this->Html->link(__('List Articles'), ['action' => 'index'], ['class' => 'side-nav-item text-warning']) ?>
        </div>
        <div class="text-center col col-6" >
            <h2>Prévisualisation</h2>
        </div>
    </div>
    <div class="row col-12">
        <div class="col col-5 my-4 mx-auto p-4 bg-dark rounded text-white slideFromTop">
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

                    echo $this->Form->control('position_image', ['class' => 'form-control bg-secondary', 'options' => ["" =>" ", "b" => "en bas", "d" => "à droite", "g" => "à gauche"]]);
                    ?>



                </fieldset>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-secondary mt-3']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <aside class="col side-nav col-5 d-flex flex-column bg-dark text-white mx-auto p-4 my-4 rounded-3 slideFromTop articles content">
            <h2 id="preview-title" style="text-align: center;padding:5px;"></h2>
            <div id="div-parent-preview" style="overflow-y: auto; overflow-x: hidden;">
                <div id="imagePreview" class="p-2 mx-auto " style="width:33%;"></div>
                <p id="preview-text" class=" " style=" overflow-wrap: break-word;" ></p>
                <div style="clear: both;"></div>
            </div>
        </aside>
    </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                $('#imagePreview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' class='img-fluid w-75 mx-auto rounded-3 mt-2 mb-3' alt='accueil' style='width: 100%'>");
            }
        });
        // position img

        $('select[name="position_image"]').on('change', function() {
            var position = $(this).val();

            // Supprimez toutes les classes de position existantes
            var div = document.getElementById("div-parent-preview");
            div.style.cssText = "overflow-y: auto; overflow-x: hidden;";
            $('#imagePreview').removeClass('float-start float-end order-1 order-2');

            // Ajoutez la nouvelle classe de position
            if (position === 'g') {
                $('#imagePreview').addClass('float-start');
            } else if (position === 'd') {
                $('#imagePreview').addClass('float-end');
            } else if (position === 'b') {
                $('#imagePreview').removeClass('float-start float-end');
                div.style.cssText = "overflow-y: auto; overflow-x: hidden;display:flex;flex-direction:column;";
                $('#imagePreview').addClass('order-2');
                $('#preview-text').addClass('order-1');
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
