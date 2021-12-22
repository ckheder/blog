<?php
/**
 *  Vue contenant les détails sur un utilisateur
 */
?>

        <table class="w3-table-all">
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mot de passe') ?></th>
                    <td><?= h($user->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Identifiant') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Création') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modification') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
            </table>

        <div class="w3-center">

                            <br />

                <div class="w3-bar">

            <?= $this->Html->link(__('Modifier cet utilisateur'), ['action' => 'edituser', $user->id], ['class' => 'w3-btn w3-blue']) ?>

            <?= $this->Form->postLink(__('Supprimer cet utilisateur'), ['action' => 'deleteuser', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'w3-button w3-red']) ?>

                 </div>
        </div>


            
