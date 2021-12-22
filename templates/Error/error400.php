<?php
/**
 * @var \App\View\AppView $this
 */
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = 'default';
$this->set('title', 'Page non trouvée');

if (Configure::read('debug')) :
    $this->layout = 'dev_error';

    $this->assign('title', 'Page non trouvée');
    $this->assign('templateName', 'error400.php');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?php Debugger::dump($error->params) ?>
<?php endif; ?>
<?= $this->element('auto_table_warning') ?>
<?php

$this->end();
endif;
?>
<h2><i class="far fa-frown"></i> Page non trouvée.</h2>
<p class="error">
    <strong><?= __d('cake', 'Erreur') ?>: </strong>
    <?= __d('cake', 'L\'adresse suivante {0} n\'existe pas.', "<strong>'{$url}'</strong>") ?>
 <div class="w3-container w3-center">
  <a href="https://christophekheder.com/blog"><span class="fa fa-home"></span> Retour à l'accueuil</a>
</div> 
    
</p>
