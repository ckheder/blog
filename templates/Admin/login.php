<?php
/**
 *  Vue contenant le formulaire de connexion
 */
?>

<div class="w3-container w3-teal">

  <h2>Connexion</h2>

</div>

<?= $this->Form->create() ?>

  <p><label class="w3-text-teal"><b>Email</b></label>

  	<?= $this->Form->control('email',['class' =>'w3-input w3-border w3-light-grey','label' =>'','id'=>'email']) ?></p>

  <p><label class="w3-text-teal"><b>Mot de passe</b></label>

  	<?= $this->Form->control('password',['class' =>'w3-input w3-border w3-light-grey','label' =>'','id'=>'password']) ?></p>

	<div class="w3-center">

		<p><button class="w3-btn w3-blue-grey">Connexion</button></p>

	</div>

<?= $this->Form->end() ?>





  