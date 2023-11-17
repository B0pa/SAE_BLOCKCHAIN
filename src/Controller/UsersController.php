<?php

namespace App\Controller;

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

}
