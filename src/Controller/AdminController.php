<?php
/**
 * Controller général pour la création, modification et suppression d'utilisateurs, d'articles et de catégorie
 */
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\Event;

class AdminController extends AppController
{

    // limitation de la pagination à 5 éléments

        public $paginate = [
                            'limit' => 5
                            ];

    /**
     * Méthode initialize
     *
     * Chargement de tous les modèles nécessaires aux opérations
     *
     */

        public function initialize() : void
    {
        parent::initialize();

        $this->loadModel('Articles');
        $this->loadModel('Tags');
        $this->loadModel('Users');
        $this->viewBuilder()->setLayout('admin');
    }

/* section utilisateur */

    /**
     * Méthode Users
     *
     * Retourne les informations du compte administrateur
     *
     */

        public function users()
    {

        $this->set('title' , 'Compte utilisateur');

        $users = $this->Users->find()

         ->select(['id','email']);

        $this->set(compact('users'));
    }

    /**
     * Méthode Userview
     *
     * Affichage des informations du compte administrateur
     *
     * Paramètre : id-> identifiant de l'utilisateur
     */

        public function userview($id = null)
    {
        $this->set('title', 'Voir utilisateur');

        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set('user', $user);
    }

   /**
     * Méthode Edituser
     *
     * Modification des informations sur l'utilisateur
     *
     * Paramètre : id-> identifiant de l'utilisateur
     */

        public function edituser($id = null)
    {
        $this->set('title', 'Modifier utilisateur');

        // récupération des informations sur l'utilisateur à modifier

        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        //Envoi des données uniquement en POST

        if ($this->request->is(['post','put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData()); // entité modifiée avec les données POST
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Modification enregistrée.'));

                return $this->redirect(['action' => 'users']);
            }
            $this->Flash->error(__('Impossible de modifier cet utilisateur.'));

        }
        $this->set(compact('user'));
    }

    /**
     * Méthode Login
     *
     * Authentification d'un utilisateur
     *
     */

        public function login()
    {

        $this->set('title' ,'Connexion requise');

        $this->viewBuilder()->setLayout('default');

    if ($this->request->is('post')) {

        // Authentification

        $user = $this->Auth->identify();
        if ($user) { // Authentification réussie
            $this->Auth->setUser($user);
            return $this->redirect($this->Auth->redirectUrl());
                    }
        $this->Flash->error('Votre identifiant ou votre mot de passe est incorrect.');

                                     }
    }
    /**
     * Méthode Logout
     *
     * Déconnexion
     *
     */
        public function logout()
    {
        $this->Flash->success('Vous avez été déconnecté.');

        return $this->redirect($this->Auth->logout()); // redirection vers l'accueuil
    }

/*section articles */

    /**
     * Méthode LIstarticles
     *
     * Affichage des articles paginés
     *
     */
        public function listarticles()
    {

        $this->set('title', 'Mes articles');

        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
    }

    /**
     * Méthode Addarticles
     *
     * Création d'un nouvel article
     *
     */

    public function addarticle()
    {
        $this->set('title', 'Nouvel article');

        $article = $this->Articles->newEmptyEntity();

        // requête POST uniquement

        if ($this->request->is('post')) {

        // création d'un tableau de données data[] afin de prendre en compte le parsage des URL et la mise en surbrillance du code

               $data = array(
                            'titre' => $this->request->getData('titre'),
                            'corps' => $this->parsing_content($this->request->getData('corps')), // parsage URL / Code
                            'categorie' => $this->request->getData('categorie')
                            );

            $article = $this->Articles->patchEntity($article, $data);

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Article publié.'));

                return $this->redirect(['action' => 'listarticles']);
            }
            $this->Flash->error(__('Impossible de publier cet article.'));
        }


        $tags = $this->Tags->find('list',[

        'keyField' => 'categorie',
    'valueField' => 'categorie'

        ]);

        $data = $tags->toArray();

// Les données ressemblent maintenant à ceci

        $this->set('tags', $data);

        $this->set('article', $article);
    }

    /**
     * Méthode Editarticle
     *
     * Modification d'un article
     *
     * Paramètre : id-> identifiant de l'article
     */

        public function editarticle($id = null)
    {
        $this->set('title', 'Modifier article');

        // récupération des informations de l'article

        $article = $this->Articles->get($id);

        //requête de type POST

        if ($this->request->is(['post','put'])) {

        // création d'un tableau de données data[] afin de prendre en compte le parsage des URL et la mise en surbrillance du code

            $data = array(
                            'titre' => $this->request->getData('titre'),
                            'corps' => $this->parsing_content($this->request->getData('corps')),
                            'categorie' => $this->request->getData('categorie')
                            );

            $article = $this->Articles->patchEntity($article, $data);

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Modification enregistrée.'));

                return $this->redirect(['action' => 'listarticles']);
            }
            $this->Flash->error(__('Impossible de modifier cet article.'));
        }

        $tags = $this->Tags->find('list',[

        'keyField' => 'categorie',
    'valueField' => 'categorie'

        ]);

        $data = $tags->toArray();

// Les données ressemblent maintenant à ceci

        $this->set('tags', $data);

        $this->set('article', $article);
    }

    /**
     * Méthode Deletearticle
     *
     * Suppression d'un article
     *
     * Paramètre : id-> identifiant de l'article
     */

        public function deletearticle($id = null)
    {
        // requête de type POST uniquement

        $this->request->allowMethod(['post','put','delete']);

        //récupération des informations de l'article

        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('Article supprimé.'));
        } else {
            $this->Flash->error(__('Impossible de supprimer cet article.'));
        }

        return $this->redirect(['action' => 'listarticles']);
    }

/*section tags */

    /**
     * Méthode Listtags
     *
     * Récupération et affichage des tags d'article
     *
     */
        public function listtags()
    {

        $this->set('title', 'Liste des catégories');

        $tags = $this->paginate($this->Tags);

        $this->set(compact('tags'));
    }

    /**
     * Méthode Addtags
     *
     * Création d'un tags
     *
     */

        public function addtags()
    {
        $this->set('title', 'Nouvelle catégorie');

        $tag = $this->Tags->newEmptyEntity();

        if ($this->request->is('post')) {

            $tag = $this->Tags->patchEntity($tag, $this->request->getData());

            if ($this->Tags->save($tag)) {
                $this->Flash->success(__('Nouvelle catégorie enregistrée.'));

                return $this->redirect(['action' => 'listtags']);
            }
            $this->Flash->error(__('Impossible de sauvegarder cette catégorie.'));
        }
        $articles = $this->Tags->find('list', ['limit' => 200]);

        $this->set(compact('tag', 'articles'));
    }

    /**
     * Méthode Edittags
     *
     * Suppression d'un article
     *
     * Paramètre : id-> identifiant du tags
     */

        public function edittags($id = null)
    {

        $this->set('title', 'Modifier une catégorie');

        // récupération des infos du tags

        $tag = $this->Tags->get($id);

        // requête POST uniquement

        if ($this->request->is(['post','put'])) {

            $tag = $this->Tags->patchEntity($tag, $this->request->getData());

            if ($this->Tags->save($tag)) {

                $this->Flash->success(__('Mise à jour effectuée.'));

                return $this->redirect(['action' => 'listtags']);
            }
            $this->Flash->error(__('Mise à jour impossible.'));
        }
        $articles = $this->Tags->find('list', ['limit' => 200]);

        $this->set(compact('tag'));
    }

    /**
     * Méthode Deletetags
     *
     * Suppression d'un tag
     *
     * Paramètre : id-> identifiant du tag
     */

        public function deletetags($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $tag = $this->Tags->get($id);

        if ($this->Tags->delete($tag)) {
            $this->Flash->success(__('Catégorie supprimée.'));
        } else {
            $this->Flash->error(__('Impossible de supprimer cette catégorie.'));
        }

        return $this->redirect(['action' => 'listtags']);
    }

    /**
     * Méthode parsing_content
     *
     * Conversion URL vers lien cliquable et mise en surbrillance du code source présent sur un article
     *
     * Paramètre : $article -> contenu de l'article
     *
     * Sortie : $article -> contenu parsé
*/
    public function parsing_content($article)
    {
        // Url

            if (preg_match_all('~\{Url}([^{]*)\{/Url}~i', $article))
        {
            $article = preg_replace('~\{Url}([^{]*)\{/Url}~i', '<a href="$1" class="link_article" target="_blank">$1</a>', $article);
        }

        // code HTML,Javascript,PHP ou Console/Bash

            elseif (preg_match_all('~\{Code}([^{]*)\{/Code}~i', $article))
        {
            $article = h($article);

            $article = preg_replace('~\{Code}([^{]*)\{/Code}~i', '<pre><code>$1</code></pre>', $article);
        }

        //element en surbrillance

            elseif (preg_match_all('~\{Highlight}([^{]*)\{/Highlight}~i', $article))
        {

            $article = preg_replace('~\{Highlight}([^{]*)\{/Highlight}~i', '<mark>$1</mark>', $article);
        }

        $article = nl2br($article); // paragraphe

        return($article);
    }

}
