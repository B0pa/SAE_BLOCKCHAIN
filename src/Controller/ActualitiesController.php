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
        // enleve la demande d'autentification pour les pages
        $this->Authentication->addUnauthenticatedActions(['cookieAccept', 'cookieRefuse','actuality']);
    }

    public function index()
    {
        //chercher les actualités dans la bdd
        $query = $this->Actualities->find();
        $actualities = $this->paginate($query);

        //envoyer les actualités à la vue
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
        //chercher l'actualité dans la bdd
        $actuality = $this->Actualities->get($id, contain: []);
        //envoyer l'actualité à la vue
        $this->set(compact('actuality'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        //créer une nouvelle actualité
        $actualities = $this->Actualities->newEmptyEntity();
        if ($this->request->is('post')) {
            //récupérer les données du formulaire
            $data = $this->request->getData();
            //si image
            if ($this->request->getData('img')) {
                //récupérer l'image
                /** @var UploadedFile $image */
                $image = $this->request->getData('img');

                //si l'image est valide
                if ($image->getError() === 0 && str_contains($image->getClientMediaType(), 'image')) {
                    //nomer l'image
                    $newName = strtolower(Text::slug($image->getClientFilename(), ['preserve' => '.']));
                    //déplacer l'image
                    $image->moveTo(WWW_ROOT . 'img/upload/' . $newName);
                    //enregistrer le nom de l'image dans la bdd
                    $data['img'] = $newName;
                }
            }
            //enregistrer l'actualité dans la bdd
            $this->Actualities->patchEntity($actualities, $data);
            //si l'actualité est enregistrée
            if ($this->Actualities->save($actualities)) {
                //afficher un message de succès
                $this->Flash->success(__('The actuality has been saved.'));
                //rediriger vers la page d'accueil
                return $this->redirect(['action' => 'index']);
            }
            //sinon afficher un message d'erreur
            $this->Flash->error(__('The actuality could not be saved. Please, try again.'));
        }
        //envoyer les actualités à la vue
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
        //chercher l'actualité dans la bdd
        $actuality = $this->Actualities->get($id, contain: []);
        //si le formulaire est soumis
        if ($this->request->is(['patch', 'post', 'put'])) {
            //récupérer les données du formulaire
            $actuality = $this->Actualities->patchEntity($actuality, $this->request->getData());

            //si l'actualité est enregistrée
            if ($this->Actualities->save($actuality)) {
                $this->Flash->success(__('The actuality has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            //sinon afficher un message d'erreur
            $this->Flash->error(__('The actuality could not be saved. Please, try again.'));
        }
        //envoyer l'actualité à la vue
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
        //chercher l'actualité dans la bdd
        $this->request->allowMethod(['post', 'delete']);
        //supprimer l'actualité
        $actuality = $this->Actualities->get($id);

        //si l'actualité est supprimée
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
        //chercher les actualités dans la bdd
        $actualities = $this->fetchTable('Actualities');

        //envoyer les actualités à la vue
        $actus = $actualities->find()->toArray();
        $this->set(compact('actus'));
    }

    public function cookieAccept() {
        //créer un cookie
        $cookie = $this->request->getCookie('validation');
        //si le cookie n'existe pas
        if ($cookie == null) {
            //créer un cookie
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
            //envoyer le cookie
            $this->response = $this->response->withCookie($validation_cookie);
        } else {
            //créer un cookie
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
            //envoyer le cookie
            $this->response = $this->response->withCookie($validation_cookie);
        }
        //rediriger vers la page précédente
        return $this->redirect($this->referer());
    }

    public function cookieRefuse() {
        //créer un cookie
        $cookie = $this->request->getCookie('validation');
        //si le cookie n'existe pas
        if ($cookie == null) {
            //créer un cookie
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
            //envoyer le cookie
            $this->response = $this->response->withCookie($validation_cookie);
        } else {
            //créer un cookie
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
            //envoyer le cookie
            $this->response = $this->response->withCookie($validation_cookie);
        }
        //rediriger vers la page précédente
        return $this->redirect($this->referer());


    }
}
