<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */


?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>     
        <?= $title ?>
    </title>
    <?= $this->Html->meta('favicon.ico','img/favicon.ico', ['type' => 'icon']); ?>
        <?= $this->Html->css('w3');?>
        <?= $this->Html->css('railscasts.css');?>
        <?= $this->Html->css('//fonts.googleapis.com/css?family=Athiti'); ?>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<?= $this->Html->script('highlight.pack.js'); ?>
<!-- initiation de highlight.js -->
<script>
hljs.initHighlightingOnLoad();
</script>
<!-- application de la polie Athiti -->
<style>
.w3-athiti {
  font-family: 'Athiti', serif;
}
</style>
</head>
<body class="w3-light-grey w3-athiti"><!-- w3-color -->
<div class="w3-content" style="max-width:1400px">
<header class="w3-container w3-center w3-padding-32"> 
  <h1>Pense bête de truc et astuces sur le développement WEB et sur l'informatique</h1>
</header>
    <div class="w3-row">
        <div class="w3-col l8 s12">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
        <div class="w3-col l4">
<?= $this->cell('Tags'); ?>
</div>
</div>
</div>
<!-- Footer -->
<footer class="w3-container w3-dark-grey">
  <p>
Code source : <a href="https://christophekheder.com/projects/christophe/blog" target="_blank">ici</a>

<br />

Tous les articles sont disponibles sous licence <a href="https://creativecommons.org/licenses/by/4.0/" rel="license" target="_blank">Creative Commons Attribution 4.0 International license</a>
</p>
</footer>
</body>
</html>
