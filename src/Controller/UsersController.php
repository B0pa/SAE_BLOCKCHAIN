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
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }

        }
    }
}



