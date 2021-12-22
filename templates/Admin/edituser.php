<?php
/**
 *  Vue contenant le formulaire d'édition d'un utilisateur
 */
?>
<div class="row">
            <?= $this->Form->create($user) ?>
               
                <label class="w3-text-teal"><b>Email</b></label>

                    <?= $this->Form->control('email', ['class' => 'w3-input w3-border w3-light-grey','label' =>'']); ?>

                <label class="w3-text-teal"><b>Mot de passe</b></label>

                    <?=  $this->Form->control('password', ['class' => 'w3-input w3-border w3-light-grey','label' =>'']);  ?>
               
            <div class="w3-center">

                <br />
                            
                    <div class="w3-bar">

            <button class="w3-btn w3-blue" type="submit">Modifier cet utilisateur</button> 

                    </div>
            </div>
            
            <?= $this->Form->end() ?>
</div>
