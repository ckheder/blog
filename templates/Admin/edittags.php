<?php
/**
 *  Vue contenant le formulaire de modification d'une catégorie
 */
?>
<div class="row">

            <?= $this->Form->create($tag) ?>

            <label class="w3-text-teal"><b>Nouveau nom</b></label>

                <?= $this->Form->control('titre', ['class' => 'w3-input w3-border w3-light-grey','label' =>'']); ?>
                
            <div class="w3-center">

                <br />

            <button class="w3-btn w3-blue" type="submit">Modifier cette catégorie</button> 

            </div>

            <?= $this->Form->end() ?>
</div>
