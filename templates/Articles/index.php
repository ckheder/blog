<?php
/**
 *  Vue contenant les articles par ordre décroissant sur la page d'accueuil du blog
 */

//génération d'un lien de tri

//mise à jour du texte de lien suivant le tri éffectué en URL

      if ($this->request->getQuery('direction') == "asc")
{
  $texte_link = '<i class="far fa-clock"></i> Voir les articles plus récents';
}
  else
{
  $texte_link = '<i class="fas fa-clock"></i> Voir les articles plus anciens';
}

echo $this->Paginator->sort('created',$texte_link,['escape' => false]);

 foreach ($articles as $article): ?>

        <div class="w3-card-4 w3-margin w3-white">

          <div class="w3-container">

              <h4><b><?= $article->titre ?></b></h4> <!--titre de l'article -->

                <span class="w3-opacity"><?= $article->created->i18nFormat('d MMMM yyyy - HH:mm') ?></span><!--date de l'article au format jour/mois/année - Heure:minutes-->
          </div>

    <div class="w3-container">

      <p><?= $article->corps ?></p> <!--corps de l'article -->

      <!--catgorie de l'article avec lien vers la recherche par tag -->

      <p>Catégorie : <a class="link_categorie" href="./articles/tagged/<?= $article->categorie ?>"><?= $article->categorie ?></a></p>             
    </div>

        </div>

    <?php endforeach; ?>

    <div class="w3-container">

        <div class="w3-bar w3-border">
        
            <?= $this->Paginator->numbers() ?> <!-- affiche des liens de page suivante -->           

        </div>
        
            <p><?= $this->Paginator->counter(__('Page {{page}} sur {{pages}}')) ?></p>
          
    </div>