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

        $this->Authentication->allowUnauthenticated(['blockchain','nft','crypto','danger','search']);
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

                //img
                if ($image->getError() === 0 && str_contains($image->getClientMediaType(), 'image')) {
                    $newName = strtolower(Text::slug($image->getClientFilename(), ['preserve' => '.']));
                    $image->moveTo(WWW_ROOT . 'img/upload/' . $newName);
                    $this->Articles->patchEntity($article, ['image' => $newName]);
                } else {
                    //dd($image);
                }
            }
            // dd($this->request->getData());
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

    public function search($category = null) {
        $query = $this->request->getQuery('query');

        $levels = $this->request->getQuery('levels');

        if ($levels === null) {
            $levels = [];
        }

        $articles1 = [];
        $articles2 = [];
        $articles3 = [];

        if ($query != null) {

            if (in_array('Niv 1', $levels)) {
                $articles1 = $this->Articles->find()
                    ->where(['category' => $category, 'level' => '1'])
                    ->andWhere(function ($exp, $q) use ($query) {
                        return $exp->or([
                            $q->newExpr()->like('title', '%' . $query . '%'),
                            $q->newExpr()->like('content', '%' . $query . '%')
                        ]);
                    })
                    ->toArray();
            }

            if (in_array('Niv 2', $levels)) {
                $articles2 = $this->Articles->find()
                    ->where(['category' => $category, 'level' => '2'])
                    ->andWhere(function ($exp, $q) use ($query) {
                        return $exp->or([
                            $q->newExpr()->like('title', '%' . $query . '%'),
                            $q->newExpr()->like('content', '%' . $query . '%')
                        ]);
                    })
                    ->toArray();
            }
            if (in_array('Niv 3', $levels)) {
                $articles3 = $this->Articles->find()
                    ->where(['category' => $category, 'level' => '3'])
                    ->andWhere(function ($exp, $q) use ($query) {
                        return $exp->or([
                            $q->newExpr()->like('title', '%' . $query . '%'),
                            $q->newExpr()->like('content', '%' . $query . '%')
                        ]);
                    })
                    ->toArray();
            }
        }else{
            if (in_array('Niv 1', $levels)) {
                $articles1 = $this->Articles->find()
                    ->where(['category' => $category, 'level' => '1'])
                    ->toArray();
            }

            if (in_array('Niv 2', $levels)) {
                $articles2 = $this->Articles->find()
                    ->where(['category' => $category, 'level' => '2'])
                    ->toArray();
            }

            if(in_array('Niv 3', $levels)) {
                $articles3 = $this->Articles->find()
                    ->where(['category' => $category, 'level' => '3'])
                    ->toArray();
            }

        }

        $this->set('category', $category);
        $this->set(compact('articles1','articles2','articles3'));
    }



    public function blockchain () {

        $articles1 = $this->Articles->find()
            ->where(['category' => 'blockchain' ,'level' => '1'])
            ->toArray();

        $articles2 = $this->Articles->find()
            ->where(['category' => 'blockchain' ,'level' => '2'])
            ->toArray();

        $articles3 = $this->Articles->find()
            ->where(['category' => 'blockchain' ,'level' => '3'])
            ->toArray();

        $this->set(compact('articles1','articles2','articles3'));
    }
    public function crypto () {

        $articles1 = $this->Articles->find()
            ->where(['category' => 'crypto' ,'level' => '1'])
            ->toArray();

        $articles2 = $this->Articles->find()
            ->where(['category' => 'crypto' ,'level' => '2'])
            ->toArray();

        $articles3 = $this->Articles->find()
            ->where(['category' => 'crypto' ,'level' => '3'])
            ->toArray();


        $this->set(compact('articles1','articles2','articles3'));


    }

    public function danger () {

        $articles1 = $this->Articles->find()
            ->where(['category' => 'danger' ,'level' => '1'])
            ->toArray();

        $articles2 = $this->Articles->find()
            ->where(['category' => 'danger' ,'level' => '2'])
            ->toArray();

        $articles3 = $this->Articles->find()
            ->where(['category' => 'danger' ,'level' => '3'])
            ->toArray();

        $this->set(compact('articles1','articles2','articles3'));
    }

    public function nft () {

        $articles1 = $this->Articles->find()
            ->where(['category' => 'nft' ,'level' => '1'])
            ->toArray();

        $articles2 = $this->Articles->find()
            ->where(['category' => 'nft' ,'level' => '2'])
            ->toArray();

        $articles3 = $this->Articles->find()
            ->where(['category' => 'nft' ,'level' => '3'])
            ->toArray();

        $this->set(compact('articles1','articles2','articles3'));
    }
}
