<?php
/**
 *  Vue contenant la liste des tags
 */
?>
<div class="w3-container">

    <i class="w3-large fas fa-plus"></i>

    <?= $this->Html->link(__('Nouvelle catégorie'), ['controller' => 'Admin','action' => 'addtags']) ?>

    <h3><?= __('Tags') ?></h3>

        <table class="w3-table-all">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>

                    <th><?= $this->Paginator->sort('categorie') ?></th>



                    <th><?= $this->Paginator->sort('crée') ?></th>
                    <th><?= $this->Paginator->sort('modifié') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tags as $tag): ?>
                <tr>
                    <td><?= $this->Number->format($tag->id) ?></td>

                    <td><?= h($tag->categorie) ?></td>



                    <td><?= h($tag->created) ?></td>
                    <td><?= h($tag->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Modifier'), ['action' => 'edittags', $tag->id]) ?>

                        <?= $this->Form->postLink(__('Effacer'), ['action' => 'deletetags', $tag->id], ['confirm' => __('Effacer '.$tag->categorie.' ?')]) ?>

                      
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
