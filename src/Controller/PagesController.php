<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Cookie\Cookie;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['actuality', 'nft', 'home','crypto','danger','blockchain','quizzDanger','quizzNFT','quizzcrypto','quizzBlockchain','wallet','tempreel','adminLogin','cookieAccept', 'cookieRefuse','profil','deleteAllCookies']);
    }

    /**
     * actuality method
     *
     */
    public function actuality()
    {
        /**
         * jfkjhdfmkjsdh
         */

        $toto = $this->request->getQuery('test');

        $this->set(compact('toto'));


    }

    /**
     * home method
     *
     * @return void
     */
    public function home()
    {

    }

    public function nft()
    {

    }

    public function crypto()
    {
        $userName = $this->request->getSession()->read('Auth.name');

        $this->set(compact('userName'));

    }

    public function danger()
    {

    }

    public function blockchain()
    {

    }

    public function wallet()
    {
        $imageName = null;
        $counter = $this->getRequest()->getCookie('nft'); // Ajoutez cette ligne

        if ($this->request->is('post')) {
            // Si le formulaire est soumis, traiter les réponses et afficher l'image
            $data = $this->request->getData();
            $imageName = $this->generateImageName($data);
        }

        // Afficher le formulaire du questionnaire
        $this->set(compact('imageName', 'counter')); // Modifiez cette ligne pour passer 'counter' à la vue
    }

    private function generateImageName($data) { // Code nft
        $question1 = isset($data['question_1']) ? $data['question_1'] : 'Ser';
        $question2 = isset($data['question_2']) ? $data['question_2'] : 'Sob';
        $question3 = isset($data['question_3']) ? $data['question_3'] : 'Ble';

        // Construire le nom de l'image en fonction des réponses
        $imageName = $question1 . $question2 . $question3 . '.png';

        return $imageName;
    }

    public function tempreel()
    {

    }

    public function adminLogin()
    {
        $data = $this->request->getData();

        // Identifie l'utilisateur
        $user = $this->Auth->identify();

        if ($user) {
            // Connexion réussie, redirige vers la page admin
            $this->Auth->setUser($user);
            return $this->redirect(['controller' => 'Articles', 'action' => 'index']);

        } else {
            // Échec de la connexion, affiche un message
            $this->Flash->error('Identifiants invalides');
        }
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

    public function profil() {

    }

    public function deleteAllCookies()
    {
        $cookies = $this->request->getCookieCollection();
        foreach ($cookies as $cookie) {
            $cookieToDelete = Cookie::create($cookie->getName(), '');
            $this->response = $this->response->withExpiredCookie($cookieToDelete);
        }

        return $this->redirect($this->referer());
    }
}

