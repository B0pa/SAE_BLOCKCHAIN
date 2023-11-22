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
//        $this->Authentication->addUnauthenticatedActions(['actuality', 'nft', 'home']);
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

    }

    public function danger()
    {

    }

    public function blockchain()
    {

    }

    public function quizzDanger()
    {

    }

    public function quizzNFT()
    {

    }

    public function quizzcrypto()
    {

    }

    public function quizzBlockchain()
    {

    }

    public function wallet()
    {

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
}


