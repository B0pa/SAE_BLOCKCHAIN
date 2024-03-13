<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actuality $actuality
 */
?>
<main class="navmarge add-main" >
    <div class="add-conteneur">
        <div class="slideFromTop add-add-conteneur">
            <div class="add-add-action-conteneur" >
                <h2 class="heading"><?= __('Actions') ?></h2>
                <?= $this->Html->link(__('List Actualities'), ['action' => 'index'],
                 ['class' => 'add-add-actions']) ?>
            </div>
        
            <?= /** @var \App\Model\Entity\Actuality $actualities */
            $this->Form->create($actualities, ['type' => 'file']) ?>
            <fieldset class="add-add-content-conteneur">
                <legend><?= __('Add Actuality') ?></legend>
                <div class="add-add-content-title">
                    <?php
                        echo $this->Form->control('title', [
                        'class' => 'form-control bg-secondary'
                        ]);
                        echo $this->Form->control('content', [
                            'class' => 'form-control bg-secondary'
                        ]) 
                    ?>
                </div>
                <div class="add-add-content-content">
                    <?php
                        echo $this->Form->control('link', [
                            'class' => 'form-control bg-secondary'
                        ]);
                        echo $this->Form->control('img', [
                            'type' => 'file',
                            'label' => 'Votre jolie image',
                            'class' => 'form-control bg-secondary',
                            'after' => $this->Form->button('Modifier l\'image', ['type' => 'button', 'class' => 'btn btn-secondary mt-3', 'id' => 'edit-upload-btn', 'data-target' => '#upload-input']),
                        ]);
                    ?>
                </div>

                
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['id' => 'add-add-content-btn-add','class' => 'grow']) ?>
            <?= $this->Form->end() ?>
        </div>
        <aside class="slideFromTop add-prev-conteneur">
            <div class="add-prev-title" >
                <h2>Prévisualisation</h2>
                <hr>
            </div>
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
        $('#add-css-title').on('input', function() {
            // Obtenez la classe Bootstrap entrée par l'utilisateur
            var bootstrapClass = $(this).val();

            // Appliquez la classe Bootstrap à l'élément de titre
            $('#preview-title').attr('style', bootstrapClass);
        });

        $('#add-css-content').on('input', function() {
            // Obtenez la classe Bootstrap entrée par l'utilisateur
            var bootstrapClass = $(this).val();

            // Appliquez la classe Bootstrap à l'élément de titre
            $('#preview-text').attr('style', bootstrapClass);
        });

        $('#add-css-img').on('input', function() {
            // Obtenez la classe Bootstrap entrée par l'utilisateur
            var bootstrapClass = $(this).val();

            // Appliquez la classe Bootstrap à l'image elle-même
            $('#imagePreview img').attr('style', bootstrapClass);
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
