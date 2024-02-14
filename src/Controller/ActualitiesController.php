<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Table\ActualitiesTable;
use Cake\Http\Cookie\Cookie;
use Cake\Utility\Text;

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
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['cookieAccept', 'cookieRefuse','actuality']);
    }

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
    // public function add()
    // {
    //     $actuality = $this->Actualities->newEmptyEntity();
    //     if ($this->request->is('post')) {
    //         $actuality = $this->Actualities->patchEntity($actuality, $this->request->getData());
    //         if ($this->Actualities->save($actuality)) {
    //             $this->Flash->success(__('The actuality has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The actuality could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('actuality'));
    // }
    public function add()
    {
        $actualities = $this->Actualities->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            if ($this->request->getData('img')) {
                /** @var UploadedFile $image */
                $image = $this->request->getData('img');
                if ($image->getError() === 0 && str_contains($image->getClientMediaType(), 'image')) {
                    $newName = strtolower(Text::slug($image->getClientFilename(), ['preserve' => '.']));
                    $image->moveTo(WWW_ROOT . 'img/upload/' . $newName);
                    $data['img'] = $newName;
                }
            }
            $this->Actualities->patchEntity($actualities, $data);
            if ($this->Actualities->save($actualities)) {
                $this->Flash->success(__('The actuality has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actuality could not be saved. Please, try again.'));
        }
        $this->set(compact('actualities'));
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
    public function actuality()
    {
        /** @var ActualitiesTable $actualities */
        $actualities = $this->fetchTable('Actualities');

        $actus = $actualities->find()->toArray();
        $this->set(compact('actus'));
    }

    public function cookieAccept() {
        $cookie = $this->request->getCookie('validation');
        if ($cookie == null) {
            $validation_cookie = Cookie::create(
                'validation',
                1,
                // All keys are optional
                [
                    'expires' => new \DateTime('+1 day'),
                    'path' => '/',
                    'domain' => '',
                    'secure' => false,
                    'httponly' => false,
                    'samesite' => null // Or one of CookieInterface::SAMESITE_* constants
                ]
            );
            $this->response = $this->response->withCookie($validation_cookie);
        } else {
            $validation_cookie = Cookie::create(
                'validation',
                1,
                // All keys are optional
                [
                    'expires' => new \DateTime('+1 day'),
                    'path' => '/',
                    'domain' => '',
                    'secure' => false,
                    'httponly' => false,
                    'samesite' => null // Or one of CookieInterface::SAMESITE_* constants
                ]
            );
            $this->response = $this->response->withCookie($validation_cookie);
        }
        return $this->redirect($this->referer());
    }

    public function cookieRefuse() {
        $cookie = $this->request->getCookie('validation');
        if ($cookie == null) {
            $validation_cookie = Cookie::create(
                'validation',
                2,
                // All keys are optional
                [
                    'expires' => new \DateTime('+1 day'),
                    'path' => '/',
                    'domain' => '',
                    'secure' => false,
                    'httponly' => false,
                    'samesite' => null // Or one of CookieInterface::SAMESITE_* constants
                ]
            );
            $this->response = $this->response->withCookie($validation_cookie);
        } else {
            $validation_cookie = Cookie::create(
                'validation',
                2,
                // All keys are optional
                [
                    'expires' => new \DateTime('+1 day'),
                    'path' => '/',
                    'domain' => '',
                    'secure' => false,
                    'httponly' => false,
                    'samesite' => null // Or one of CookieInterface::SAMESITE_* constants
                ]
            );
            $this->response = $this->response->withCookie($validation_cookie);
        }
        return $this->redirect($this->referer());


    }
}
