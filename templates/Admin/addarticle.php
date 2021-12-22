<?php
/**
 *  Vue contenant le formulaire d'ajout d'un nouvel article
 */
?>
<div class="row">
    
        <div class="w3-center">

            <h2><i class="fas fa-pencil-alt"></i> Nouvelle article</h2>
            
        </div>

        <!-- formulaire de création d'article -->
    
            <?= $this->Form->create($article) ?>

        <!-- champs titre -->
        
            <?=  $this->Form->control('titre', ['class' => 'w3-input w3-border w3-light-grey','label' =>'','placeholder' =>'Titre de l\'article']); ?>

                <br />

        <!-- champs corps du message -->

            <?= $this->Form->control('corps', ['id' => 'corps_message', 'class' => 'w3-input w3-border w3-light-grey','label' =>'','placeholder' =>'Corps de l\'article']); ?>
              
                <br />

            <div class="w3-bar">

        <!-- Bouton URL -->

                <button class="w3-button" onclick="insertAtCaret('corps_message', '{Url}{/Url}');return false;"><i class="fas fa-external-link-square-alt"></i> Ajouter une url</button>

        <!-- Bouton code source -->

                <button class="w3-button" onclick="insertAtCaret('corps_message', '{Code}{/Code}');return false;"><i class="fas fa-code"></i> Ajouter du code </button>

        <!-- Bouton surbrillance -->

                <button class="w3-button" onclick="insertAtCaret('corps_message', '{Highlight}{/Highlight}');return false;"><i class="fas fa-highlighter"></i> Element en surbrillance </button>

            </div>

                <br />

        <!-- champs de sélection de la catégorie d'article -->

<?= $this->Form->control('categorie', ['type' =>'select','options'=>$tags,'class'=>'w3-select','label' => '']); ?>

            <div class="w3-center">

                <p>
                    <button class="w3-btn w3-blue-grey" type="submit">Enregistrer</button>
                </p>

            </div>

            <?= $this->Form->end() ?>
</div>

<!-- traitement javascript -->

<?= $this->Html->script('editor'); ?>
