<?php
namespace App\Controller;

use Cake\Datasource\ConnectionManager;

class UsersController extends AppController
{
    /**
    * login method
    *
    * @return void
    */
    public function login()
    {
        $this->viewBuilder()->setLayout('mini');
        if (!empty($this->request->getData())) {
            $entity = $this->Users->newEntity($this->request->getData());
            $this->Users->save($entity);
            $this->Flash->success('ok !!!');
            return $this->redirect($this->referer());
        }
    }

    /**
     * Teste la connexion à la base de données
     *
     * @return \Cake\Http\Response|null
     */
    public function testDatabaseConnection()
    {
        try {
            $connection = ConnectionManager::get('default');
            $connected = $connection->connect();
            if ($connected) {
                return $this->redirect(['action' => 'success']);
            } else {
                return $this->redirect(['action' => 'error']);
            }
        } catch (\Exception $e) {
            return $this->redirect(['action' => 'error', '?' => ['message' => $e->getMessage()]]);
        }
    }

    /**
     * Action en cas de succès
     *
     * @return void
     */
    public function success()
    {
        $this->Flash->success("Connexion à la base de données réussie!");
        $this->redirect($this->referer());
    }

    /**
     * Action en cas d'erreur
     *
     * @return void
     */
    public function error()
    {
        $errorMessage = $this->request->getQuery('message', 'La connexion à la base de données a échoué.');
        $this->Flash->error($errorMessage);
        $this->redirect($this->referer());
    }
}
