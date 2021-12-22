<?php
/**
 *  Vue contenant le formulaire d'édition d'un article
 */
?>
<div class="row">
       
            <?= $this->Form->create($article); ?>

                    <?= $this->Form->control('titre', ['class' => 'w3-input w3-border w3-light-grey','label' =>'','placeholder' =>'Titre de l\'article']); ?>

                    <br />

                    <?= $this->Form->control('corps', ['id' => 'corps_message','class' => 'w3-input w3-border w3-light-grey','label' =>'','placeholder' =>'Corps de l\'article']); ?>
                    
                    <br />
                                
            <div class="w3-bar">

                <button class="w3-button" onclick="insertAtCaret('corps_message', '{Url}{/Url}');return false;"><i class="fas fa-external-link-square-alt"></i> Ajouter une url</button>

                <button class="w3-button" onclick="insertAtCaret('corps_message', '{Code}{/Code}');return false;"><i class="fas fa-code"></i> Ajouter du code </button>

            <!-- Bouton surbrillance -->

                <button class="w3-button" onclick="insertAtCaret('corps_message', '{Highlight}{/Highlight}');return false;"><i class="fas fa-highlighter"></i> Element en surbrillance </button>

            <!-- Supprimer les <br> -->

                <button class="w3-button" type="button" onclick="removebr();return false;"><i class="fas fa-unlink"></i> Supprimer les éléments br </button>



            </div>

                <br />

            <?= $this->Form->control('categorie', ['type' =>'select','options'=>$tags,'class'=>'w3-select','label' => '']); ?>

                <div class="w3-center">

                    <br />

                    <div class="w3-bar">

            <button class="w3-btn w3-blue" type="submit">Enregistrer les modifications</button>

       

        </div>

                </div>

            <?= $this->Form->end() ?>

                 <?= $this->Form->postLink(
                __('Supprimer cet article'), 
                ['action' => 'deletearticle', $article->id], 
                ['confirm' => __('Effacer cet article : '.$article->titre.' ?'), 'class' => 'w3-button w3-red']) ?> 

</div>

<?= $this->Html->script('editor'); ?>
