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

    public function update(){

    }

    public function updateactuality(){

    }

    public function updateinfo(){


//        $info = new Form();
//        if ($this->request->is('post')) {
//            $this->Flash->success(__("succés"));
//
//            return $this->redirect('/');
//
//
//        }
//        $this->set("info",$info);


//        if ($this->request->is('post')) {
//            debug($this->request->getData()); // Contient-il les données postées ?
//            $this->Flash->success(__("succés"));
//
//            return $this->redirect('/');
//        }
        $page = $this->Users->newEmptyEntity(); // entité vide
        if (!empty($this->request->getData())) {
            $this->Users->patchEntity($page, $this->request->getData());
            //debug($this->request->getData());
            if ($this->Users->save($page)) {

                $this->Flash->success(__('la page a été sauvegardée'));

                return $this->redirect('/');
            }
            $this->Flash->error(__('la page na pas été enregistrer reessayer D=.'));
        }
        $this->set(compact('page'));
    }

    public function updatequizz(){

    }

}



