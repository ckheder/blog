<?php
/**
 *  Element representant le menu de l'interface administrateur
 */
?>

<ul class="w3-ul">

	<li>
		<i class="w3-large fas fa-user-alt"></i>
			<a href="/blog/admin/users">Mon compte</a>
	</li>

	<li>
		<i class="w3-large fas fa-pencil-alt"></i>
			<a href="/blog/admin/listarticles?sort=id&direction=desc">Gérer les articles</a>
	</li>

	<li>
		<i class="w3-large fas fa-bookmark"></i>
			<a href="/blog/admin/listtags">Gérer les catégories</a>
	</li>

	<li>
		<i class="w3-large fas fa-sign-out-alt"></i>
			<a href="/blog/admin/logout">Déconnexion</a>
	</li>

</ul>
