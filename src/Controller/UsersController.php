<?php

namespace App\Controller;

use Cake\Form\Form;

class UsersController extends AppController
{


    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['login']);
    }

    /**
     * login method
     *
     */
    public function login()
    {
        $result = $this->Authentication->getResult();
        // If the user is logged in send them away.
        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/';
            return $this->redirect($target);
        }
        if ($this->request->is('post')) {
            $this->Flash->error('Invalid username or password');
            return $this->redirect($this->referer());
        }
        $this->viewBuilder()->setLayout('mini');
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
    }


    public function register()
    {

        $user = $this->Users->newEmptyEntity(); // entité vide
        if (!empty($this->request->getData())) {
            $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {

                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect('/');
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));

    }

    public function update()
    {

    }

    public function index()

    {
        $query = $this->Users->find();
        $users = $this->paginate($query);
        $this->set(compact('users'));
    }


    public function delete($id = null)

    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
