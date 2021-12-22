<?php
/**
 *  Vue contenant le résultat de la recherche par tags
 */
?>

<div class="w3-container">

    <i class="fas fa-home"></i>

      <a href="/blog">Retour a l'accueil</a>

      <br />
      <br />

      <!-- génération de lien de tri -->

      <?php

            if ($this->request->getQuery('direction') == "asc")
{
  $texte_link = '<i class="far fa-clock"></i> Voir les articles plus récents';
}
  else
{
  $texte_link = '<i class="fas fa-clock"></i> Voir les articles plus anciens';
}

//permet de récupérer le tag en URL

echo $this->Paginator->options([
    'url' => [
        'controller' => 'Articles',
        'action' => 'tagged',
        $tags]
    ]);


echo $this->Paginator->sort('created',$texte_link,['escape' => false]);


?>

  <div class="w3-center">

     <h1> Articles avec le tag <?= h($tags) ?> </h1>

  </div>

<?= $this->Paginator->limitControl([25 => 25, 50 => 50]); ?>

</div>

<?php foreach ($articles as $article): ?>
  
  <div class="w3-card-4 w3-margin w3-white">

    <div class="w3-container">

      <h4><b><?= $article->titre ?></b></h4>

<span class="w3-opacity"><?= $article->created->i18nFormat('d MMMM yyyy - HH:mm') ?></span>

    </div>

    <div class="w3-container">

      <p><?= $article->corps ?></p>

      <p><span class="w3-tag  w3-blue"><?= h($tags) ?></p></span>

    </div>

</div>
    
<?php endforeach; ?>

    <div class="w3-container">

        <div class="w3-bar w3-border">
        
            <?= $this->Paginator->numbers() ?>

        </div>
        
            <p><?= $this->Paginator->counter(__('Page {{page}} sur {{pages}}')) ?></p>
          
    </div>


