<?php
/**
 *  Vue Cell contenant la liste des tags avec lien vers la recherche par tag
 */
?>

<div class="w3-container">

		<h2>Categories</h2>

	<ul class="w3-ul w3-border w3-hoverable w3-large">

		<?php foreach ($tags as $tags): ?>

			<li class="w3-padding-large">


				<a href="/blog/articles/tagged/<?= $tags->categorie ?>"><?=  $tags->categorie ?></a>

				<a href="/blog/articles/tagged/<?= $tags->titre ?>"><?=  $tags->titre ?></a>

			</li>

		<?php endforeach;  ?>

	</ul>

			<br />

</div>
