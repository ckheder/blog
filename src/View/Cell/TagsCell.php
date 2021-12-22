<?php

// cell qui va afficher sur la div de droite sur le page d'accueil la liste des catégories + un lien permettant de faire une recherche par catégories

declare(strict_types=1);

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Tags cell
 */
class TagsCell extends Cell
{
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];


    /**
     * Méthode Display
     *
     * Récupération de la liste des catégories
     */
        public function display()
    {
        $this->loadModel('Tags');

        $list_tags = $this->Tags->find()->select(['categorie']);

        $this->set('tags', $list_tags);
    }
}
