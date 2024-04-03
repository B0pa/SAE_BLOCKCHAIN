<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actuality $actuality
 */
?>
<main class="navmarge add-main" >
    <div class="add-conteneur">
        <div class="slideFromTop add-add-conteneur">
            <div class="add-add-action-conteneur">
                <h2 class="heading"><?= __('Actions') ?></h2>
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $actuality->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $actuality->id), 'class' => 'add-add-actions']
                ) ?>
                <?= $this->Html->link(__('List Actualities'), ['action' => 'index'], ['class' => 'add-add-actions']) ?>
            </div>
            <?= $this->Form->create($actuality) ?>
            <fieldset class="add-add-content-conteneur">
                <legend><?= __('Edit Actuality') ?></legend>
                <div class="add-add-content-title">
                    <?php
                    echo $this->Form->control('title', [
                        'class' => 'form-control'
                    ]);
                    echo $this->Form->control('content', [
                        'class' => 'form-control'
                    ]); ?>
                </div>
                <div class="add-add-content-content">
                    <?php
                    echo $this->Form->control('link', [
                        'class' => 'form-control bg-secondary'
                    ]);
                    echo $this->Form->control('img', [
                        'type' => 'file',
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
                <a id="preview-link"></a>
                <div style="clear: both;"></div>
            </div>
        </aside>
    </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function() {


        $('button').click(function() {
            var target = $(this).data('target');
            $(target).show();
        });


        $('textarea[name="content"]').on('input', function() {
            var content = $(this).val().replace(/ /g, "&nbsp;").replace(/\n/g, "<br>");
            $('#preview-text').html(content);
        });

        $('input[name="title"]').on('input', function() {
            $('#preview-title').text($(this).val());
        });


        $('input[name="img"]').on('change', function(event) {
            $('#imagePreview').empty(); // Clear the preview area before appending new image
            $('#imagePreview').append("<img src='" + URL.createObjectURL(event.target.files[0]) + "' class='img-fluid w-75 mx-auto rounded-3 mt-2 mb-3' alt='accueil' style='width: 100%'>");
        });

        $('input[name="link"]').on('input', function() {
            var title = $('input[name="title"]').val();
            $('#preview-link').html('<a href="' + $(this).val() + '" class="btn btn-primary mt-3" target="_blank">' + title + '</a>');
        });


        $('#boldButton').on('click', function() {
            wrapSelection('content', '<strong>', '</strong>');
        });

        $('#underlineButton').on('click', function() {
            wrapSelection('content', '<u>', '</u>');
        });


        // Premiere mise a jour

        $('input[name="title"]').trigger('input');
        $('textarea[name="content"]').trigger('input');
        $('input[name="link"]').trigger('input');
        // Vérifiez si une image a déjà été téléchargée pour l'article
        if($('input[name="upload"]').val() !== null) {
            $('#imagePreview').html('<img src="/img/upload/' + '<?= $actuality->img ?>' + '" class="img-fluid w-75 mx-auto rounded-3 mt-2 mb-3" alt="accueil" style="">');
        }

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
