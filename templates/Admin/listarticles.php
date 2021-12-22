<?php
/**
 *  Vue contenant la liste des articles enreigstré par ordre décroissant
 */
?>
<div class="w3-container">

     <i class="w3-large fas fa-plus"></i>

    <?= $this->Html->link(__('Nouvel Article'), ['controller' => 'Admin','action' => 'addarticle']) ?>

    <h3><?= __('Articles') ?></h3>



    <?php

          if ($this->request->getQuery('direction') == "desc")
{
  $texte_link = '<i class="far fa-clock"></i> Voir les articles plus anciens';
}
  else
{
  $texte_link = '<i class="fas fa-clock"></i> Voir les articles plus récents';
}

echo $this->Paginator->sort('created',$texte_link,['escape' => false, 'direction' =>'desc']);

?>

        <table class="w3-table-all">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Article</th>
                    <th><?= $this->Paginator->sort('categorie')?></th>



                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article): ?>
                <tr>
                    <td><?= h($article->titre) ?></td>
                    <td style="padding: 1px !important"><?= h($article->corps) ?></td>
                    <td><?= h($article->categorie) ?></td>


                    <td class="actions">
                        <?= $this->Html->link(__('Modifier'), ['action' => 'editarticle', $article->id]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <br />

        <div class="w3-bar w3-border">

            <?= $this->Paginator->numbers() ?>

        </div>

        <p><?= $this->Paginator->counter(__('Page {{page}} sur {{pages}}')) ?>

        </p>
</div>
