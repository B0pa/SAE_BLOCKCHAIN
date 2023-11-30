<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Utility\Text;
use Laminas\Diactoros\UploadedFile;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['blockchain']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Articles->find();
        $articles = $this->paginate($query);

        $this->set(compact('articles'));
    }

    public function view($id) {
        $article = $this->Articles->get($id);
        $this->set(compact('article'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEmptyEntity();
        if ($this->request->is('post')) {
            if ($this->request->getData('upload')) {
                /** @var UploadedFile $image */
                $image = $this->request->getData('upload');
                if ($image->getError() === 0 && str_contains($image->getClientMediaType(), 'image')) {
                    $newName = strtolower(Text::slug($image->getClientFilename(), ['preserve' => '.']));
                    $image->moveTo(WWW_ROOT . 'img/upload/' . $newName);
                    $this->Articles->patchEntity($article, ['image' => $newName]);
                } else {
                    dd($image);
                }
            }
            $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $this->set(compact('article'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $this->set(compact('article'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function blockchain () {

        $articles = $this->Articles->find()
            ->where(['category' => 'blockchain'])
            ->toArray();

        $this->set(compact('articles'));
    }
    public function crypto () {

        $articles = $this->Articles->find()
            ->where(['category' => 'crypto'])
            ->toArray();

        $this->set(compact('articles'));
    }
    public function danger () {

        $articles = $this->Articles->find()
            ->where(['category' => 'danger'])
            ->toArray();

        $this->set(compact('articles'));
    }

    public function nft () {

        $articles = $this->Articles->find()
            ->where(['category' => 'nft'])
            ->toArray();

        $this->set(compact('articles'));
    }
}
