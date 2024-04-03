<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */

?>

<main class="navmarge add-main" >
    <div class="add-conteneur">
        <div class="slideFromTop add-add-conteneur">
            <div class="add-add-action-conteneur" >
                <h2 class=""><?= __('Actions') ?></h2>
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $article->id],
                    ['confirm' => __('etes vous sure de supprimer cette article ? # {0}?', $article->id), 'class' => 'add-add-actions']
                ) ?>
                <?= $this->Html->link(__('List Articles'), ['action' => 'index'], ['class' => 'add-add-actions']) ?>
            </div>
            <?= $this->Form->create($article) ?>
            <fieldset class="add-add-content-conteneur">
                <legend class="" ><?= __('Edit Article') ?></legend>
                <div class="add-add-content-title">
                    <?php
                    echo $this->Form->control('title', [
                        'class' => 'form-control bg-secondary'
                    ]);
                    echo $this->Form->button('Modifier le CSS du titre', ['type' => 'button', 'class' => 'btn btn-secondary mt-3', 'id' => 'edit-content-btn', 'data-target' => '#css_title']);
                    echo $this->Form->text('css_title', ['style' => 'display: none;', 'class' => 'form-control bg-secondary', 'id' => 'css_title']);
                    ?>
                </div>
                <div class="add-add-content-content">
                    <?php
                    echo $this->Form->control('content',[
                        'class' => 'form-control bg-secondary'
                    ]);
                    echo $this->Form->button('Gras', ['type' => 'button', 'class' => 'btn btn-secondary mt-3', 'id' => 'boldButton']);
                    echo $this->Form->button('Souligner', ['type' => 'button', 'class' => 'btn btn-secondary mt-3', 'id' => 'underlineButton']);
                    echo $this->Form->button('Modifier le CSS du contenu', ['type' => 'button', 'class' => 'btn btn-secondary mt-3', 'id' => 'edit-content-btn', 'data-target' => '#css_content']);
                    echo $this->Form->text('css_content', ['style' => 'display: none;', 'class' => 'form-control bg-secondary', 'id' => 'css_content']);
                    ?>

                </div>
                <div class="add-add-content-options">
                    <?php
                    echo $this->Form->control('level', ['class' => 'form-control bg-secondary', 'options' => [1 => 1, 2 => 2, 3 => 3]]);
                    echo $this->Form->control('category',['class' => 'form-control bg-secondary','options' => ['blockchain' => 'Blockchain', 'danger' => 'Danger', 'nft' => 'NFT', 'crypto' => 'Crypto']] );
                    echo $this->Form->control('upload', [
                        'type' => 'file',
                        'label' => 'Votre jolie image',
                        'class' => 'form-control bg-secondary',
                        'after' => $this->Form->button('Modifier l\'image', ['type' => 'button', 'class' => 'btn btn-secondary mt-3', 'id' => 'edit-upload-btn', 'data-target' => '#upload-input']),
                    ]);
                    echo $this->Form->button("Modifier le CSS de l'image ", ['type' => 'button', 'class' => 'btn btn-secondary mt-3', 'id' => 'edit-content-btn', 'data-target' => '#css_img']);
                    echo $this->Form->text('css_img', ['style' => 'display: none;', 'class' => 'form-control bg-secondary', 'id' => 'css_img']);
                    ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-secondary mt-3']) ?>
            <?= $this->Form->end() ?>
        </div>
        <aside class="slideFromTop add-prev-conteneur">
            <div class="add-prev-title" >
                <h2>Prévisualisation</h2>
                <hr>
            </div>
            <h2 id="preview-title" style="text-align: center;padding:5px;"></h2>
            <div id="div-parent-preview" style="overflow-y: auto; overflow-x: hidden;">
                <div id="imagePreview" style="padding:20px;"></div>
                <p  id="preview-text" style="overflow-wrap: anywhere;padding:5px;text-align: justify;"></p>
                <div style="clear: both;"></div>
            </div>
        </aside>
    </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function() {


        // Initialisation de la prévisualisation

        $('#preview-title').text($('input[name="title"]').val());
        var content = $('textarea[name="content"]').val().replace(/ /g, "&nbsp;").replace(/\n/g, "<br>");
        $('#preview-text').html(content);

        console.log(content);

        // Vérifiez si une image a déjà été téléchargée pour l'article
        if($('input[name="upload"]').val() !== null) {
            $('#imagePreview').html('<img src="/img/upload/' + '<?= $article->image ?>' + '" class="img-fluid w-75 mx-auto rounded-3 mt-2 mb-3" alt="accueil" style="">');
        }

        // Lorsque le bouton de modification du contenu est cliqué
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

        $('#css_title').trigger('input');

        $('#css_content').on('input', function() {
            // Obtenez la classe Bootstrap entrée par l'utilisateur
            var bootstrapClass = $(this).val();

            // Appliquez la classe Bootstrap à l'élément de titre
            $('#preview-text').attr('class', bootstrapClass);
        });

        $('#css_content').trigger('input');

        $('#css_img').on('input', function() {
            // Obtenez la classe Bootstrap entrée par l'utilisateur
            var bootstrapClass = $(this).val();

            // Appliquez la classe Bootstrap à l'image elle-même
            $('#imagePreview img').attr('class', bootstrapClass);
        });

        $('#css_img').trigger('input');

        //prévisualisation

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
                // Obtenez la classe Bootstrap entrée par l'utilisateur
                var bootstrapClass = $('#css_img').val();

                // Ajoutez la classe Bootstrap à l'image lors de sa création
                $('#imagePreview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' class='" + bootstrapClass + " img-fluid w-75 mx-auto rounded-3 mt-2 mb-3' alt='accueil' style=''>");
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
