<?php
/**
 *  Vue contenant la liste des utilisateurs
 */
?>
<div class="w3-container">
  
        <table class="w3-table-all">
            <thead>
                <tr>
                    <th>Identifiant</th>
                    <th>Email</th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Voir'), ['action' => 'userview', $user->id]) ?>                        
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>
