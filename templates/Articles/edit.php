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
            <?= $this->Form->button(__('Submit'),
                ['id' => 'add-add-content-btn-add','class' => 'grow']) ?>
            <?= $this->Form->end() ?>
        </div>
        <aside class="slideFromTop add-prev-conteneur">
            <div class="add-prev-title" >
                <h2>Prévisualisation</h2>
                <hr>
            </div>
            <?php
            /** @var \App\Model\Entity\Article[] $article */
            $divposition = "";
            $flexStyle = " ";
            // si article par default
            if ($article->css_title == null){
                $article->css_title = "";
            }
            if ($article->css_content == null){
                $article->css_content = "display:flex;";
            }
            if ($article->css_img == null){
                $article->css_img = "width:100%;";
            }

            if ($article->position_image == null){
                $article->position_image = "display:flex;width:75%; margin-left:auto;margin-right:auto;";
            }

            if ($article->position_image == "b"){
                $divposition = "width:50%;order:2;";
                $article->css_content = $article->css_content . " order:1;";
                $flexStyle = "flex-direction:column; ";
                $article->css_img = "width:100%;";
            }

            if ($article->position_image == "d"){
                $divposition = "width:25%;float:right;margin-left:20px; ";
                $article->css_content = "";
                $flexStyle = "justify-content:flex-end;";
                $article->css_img = "width:100%;";
            }

            if ($article->position_image == "g"){
                $divposition = "width:25%;float:left;margin-right:20px;";
                $article->css_content = "";
                $flexStyle = "justify-content:flex-start;";
                $article->css_img = "width:100%;";

            }
            ?>

            <div class="crypto-conteneur-articles" >
                <p class="crypto-level-articles" ><?= $article->level?></p>
                <h2 class="crypto-titre-articles" style="<?= $article->css_title ?>" ><?= $article->title ?></h2>

                <div class="crypto-conteneur-bas-articles" >
                    <div id="div-parent-preview" class="crypto-img-textes-articles" style="<?= $flexStyle ?>">

                        <div class="crypto-conteneur-img-articles" style="<?= $divposition ?>" >
                            <?= $this->Html->image("upload/" . $article->image, ['class'=>'crypto-img-articles','style' => $article->css_img ,'alt' => 'accueil'])?>
                        </div>

                        <p class="crypto-texte-articles"  style="<?= $article->css_content ?>"><?= nl2br($article->content)?></p>
                        <div class="clear"></div>
                    </div>
                </div>

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
            $('#preview-title').attr('style', bootstrapClass);
        });

        $('#css_title').trigger('input');

        $('#css_content').on('input', function() {
            // Obtenez la classe Bootstrap entrée par l'utilisateur
            var bootstrapClass = $(this).val();

            // Appliquez la classe Bootstrap à l'élément de titre
            $('#preview-text').attr('style', bootstrapClass);
        });

        $('#css_content').trigger('input');

        $('#css_img').on('input', function() {
            // Obtenez la classe Bootstrap entrée par l'utilisateur
            var bootstrapClass = $(this).val();

            // Appliquez la classe Bootstrap à l'image elle-même
            $('#imagePreview img').attr('style', bootstrapClass);
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
        $('#addarticles-inputfile').on('change', function() {
            $('#imagePreview').empty();
            var total_file = document.getElementById("addarticles-inputfile").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#imagePreview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' alt='accueil' style='width: 100%;border-radius:10px;'>");
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
