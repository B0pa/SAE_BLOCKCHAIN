<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Actualities Controller
 *
 * @property \App\Model\Table\ActualitiesTable $Actualities
 */
class ActualitiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Actualities->find();
        $actualities = $this->paginate($query);

        $this->set(compact('actualities'));
    }

    /**
     * View method
     *
     * @param string|null $id Actuality id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $actuality = $this->Actualities->get($id, contain: []);
        $this->set(compact('actuality'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $actuality = $this->Actualities->newEmptyEntity();
        if ($this->request->is('post')) {
            $actuality = $this->Actualities->patchEntity($actuality, $this->request->getData());
            if ($this->Actualities->save($actuality)) {
                $this->Flash->success(__('The actuality has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actuality could not be saved. Please, try again.'));
        }
        $this->set(compact('actuality'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Actuality id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $actuality = $this->Actualities->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actuality = $this->Actualities->patchEntity($actuality, $this->request->getData());
            if ($this->Actualities->save($actuality)) {
                $this->Flash->success(__('The actuality has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actuality could not be saved. Please, try again.'));
        }
        $this->set(compact('actuality'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Actuality id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $actuality = $this->Actualities->get($id);
        if ($this->Actualities->delete($actuality)) {
            $this->Flash->success(__('The actuality has been deleted.'));
        } else {
            $this->Flash->error(__('The actuality could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
