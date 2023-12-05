<?php

namespace App\Controller;

class BlockchainArticleController extends AppController { 
    public function initialize(): void { 
        parent::initialize(); 
        $this->loadModel('Blockchain_article'); 
    }

public function index()
{
    // Afficher la liste de tous les articles
    $articles = $this->Blockchain_article->find('all');
    $this->set(compact('articles'));
}

public function view($id = null)
{
    // Afficher le détail d'un article
    $article = $this->Blockchain_article->get($id);
    $this->set(compact('article'));
}

public function updateinfo()
{
    // Créer un nouvel article lié à un niveau
    $article = $this->Blockchain_article->newEmptyEntity();
    if ($this->request->is('post')) {
        $article = $this->Blockchain_article->patchEntity($article, $this->request->getData());
        if ($this->Blockchain_article->save($article)) {
            $this->Flash->success(__('L\'article a été créé.'));
            return $this->redirect(['action' => 'view', $article->id]);
        }
        $this->Flash->error(__('L\'article n\'a pas été créé. Veuillez réessayer.'));
    }
    $this->set(compact('article'));
}

public function edit($id = null)
{
    // Modifier un article existant
    $article = $this->Blockchain_article->get($id);
    if ($this->request->is(['patch', 'post', 'put'])) {
        $article = $this->Blockchain_article->patchEntity($article, $this->request->getData());
        if ($this->Blockchain_article->save($article)) {
            $this->Flash->success(__('L\'article a été modifié.'));
            return $this->redirect(['action' => 'view', $article->id]);
        }
        $this->Flash->error(__('L\'article n\'a pas été modifié. Veuillez réessayer.'));
    }
    $this->set(compact('article'));
}

public function delete($id = null)
{
    // Supprimer un article
    $this->request->allowMethod(['post', 'delete']);
    $article = $this->Blockchain_article->get($id);
    if ($this->Blockchain_article->delete($article)) {
        $this->Flash->success(__('L\'article a été supprimé.'));
    } else {
        $this->Flash->error(__('L\'article n\'a pas été supprimé. Veuillez réessayer.'));
    }
    return $this->redirect(['action' => 'index']);
}

}