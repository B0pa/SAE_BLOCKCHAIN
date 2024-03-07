<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actuality $actuality
 */
?>
<?= $this->element('nav_admin')?>
<main class="mt-5 pt-3 " >
    <div class="d-flex col col-12">
        <div class="text-center col col-6">
            <h2 class="heading"><?= __('Actions') ?></h2>
            <?= $this->Html->link(__('List Articles'), ['action' => 'index'], ['class' => 'side-nav-item text-warning']) ?>
        </div>
        <div class="text-center col col-6" >
            <h2>Prévisualisation</h2>
        </div>
    </div>
        <div class="col-9 p-3 bg-dark rounded text-white">
            <div class="actualities content">
                <?= /** @var \App\Model\Entity\Actuality $actualities */
                $this->Form->create($actualities, ['type' => 'file']) ?>
                <fieldset>
                    <legend><?= __('Add Actuality') ?></legend>
                    <?php
                    echo $this->Form->control('title', [
                        'class' => 'form-control bg-secondary'
                    ]);
                    echo $this->Form->control('content', [
                        'class' => 'form-control bg-secondary'
                    ]);
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
                <a id="preview-link" class=" " style=" overflow-wrap: break-word;" ></a>
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

        $('input[name="link"]').on('input', function() {
            var content = $(this).val().replace(/ /g, "&nbsp;").replace(/\n/g, "<br>");
            $('#preview-link').html(content);
        });


        $('textarea[name="content"]').on('input', function() {
            var content = $(this).val().replace(/ /g, "&nbsp;").replace(/\n/g, "<br>");
            $('#preview-text').html(content);
        });

        $('input[name="title"]').on('input', function() {
            $('#preview-title').text($(this).val());
        });


        $('input[name="img"]').on('change', function() {
            $('#imagePreview').html('');
            var total_file = document.getElementById("img").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#imagePreview').append("<img src='" + URL.createObjectURL(this.files[i]) + "' class='img-fluid w-75 mx-auto rounded-3 mt-2 mb-3' alt='accueil' style='width: 100%'>");
            }
        });
        // position img


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
