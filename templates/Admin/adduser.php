<?php
/**
 *  Vue contenant le formulaire de création d'un nouvel utilisateur
 */
?>
<div class="row">

            <?= $this->Form->create($user) ?>

                <p>

                  <label class="w3-text-teal"><b>Email</b></label>
  
                    <input class="w3-input w3-border w3-light-grey" type="email" id="email" name="email">

                </p>

                <p>
                  <label class="w3-text-teal"><b>Mot de passe</b></label>

                    <input class="w3-input w3-border w3-light-grey" type="password" id="password" name="password"></p>

            <div class="w3-center">

            <p>

              <button class="w3-btn w3-blue-grey" type="submit">Enregistrer</button>

            </p>

            </div>
            
            <?= $this->Form->end() ?>

</div>
