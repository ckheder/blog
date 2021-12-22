<?php
/**
 * Controller pour l'affichage des articles sur la partie publique du blog ainsi que la recherche des articles par tag
 */
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\Event;
use Cake\ORM\Query;


class ArticlesController extends AppController
{

     // limitation de la pagination à 5 éléments et que l'affichage soit du plus récent au plus ancien

        public $paginate = [
        'limit' => 5,
        'order' => [
            'created' => 'desc'
        ]
    ];

    /**
     * Méthode index
     *
     * Affichage des articles sur la page d'accueil du blog
     *
     */

        public function index()
    {
        $this->set('title', 'Pense bête de truc et astuces sur le développement WEB et sur l\'informatique');
                                                  
        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
    }

        /**
     * Méthode tagged
     *
     * Retourne tous les articles avec la catégorie passé en paramètre d'URL
     *
     */

        public function tagged()
    {
        // tags pour la recherche

        $tags = $this->request->getParam('tags');

        // titre de page

        $this->set('title','Articles taggés '.$tags.'');

        // recherche de tous les articles ayant pour catégorie $tags et classement en ordre décroissant


        $articles = $this->Articles->find()

                    ->select(['titre','corps','created'])

                    ->where(['categorie' => $tags]);
                    //debug($articles);

        $articles = $this->paginate($articles);

        // envoi des résultats à la vue

        $this->set([
                        'articles' => $articles,
                        'tags' => $tags
                    ]);

    }  
}
