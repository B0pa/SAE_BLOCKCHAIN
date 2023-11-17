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

use Cake\Controller\Controller;
use Cake\Http\Response;
use Cake\Http\Cookie\Cookie;
use Cake\I18n\DateTime;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $components = ['Database'];
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {

        parent::initialize();

        $this->loadComponent('Flash');
        $this->defineNFTCookie();



        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }


    public function defineNftCookie()
    {
        $this->response = $this->response->withCookie(Cookie::create(
            'nft',
            0,
            // All keys are optional
            [
                'expires' => new DateTime('+1 day'),
                'path' => '',
                'domain' => '',
                'secure' => false,
                'httponly' => false,
                'samesite' => null // Or one of CookieInterface::SAMESITE_* constants
            ]
        ));

        $this->response = $this->response->withCookie(Cookie::create(
            'crypto',
            0,
            // All keys are optional
            [
                'expires' => new DateTime('+1 day'),
                'path' => '',
                'domain' => '',
                'secure' => false,
                'httponly' => false,
                'samesite' => null // Or one of CookieInterface::SAMESITE_* constants
            ]
        ));

        $this->response = $this->response->withCookie(Cookie::create(
            'danger',
            0,
            // All keys are optional
            [
                'expires' => new DateTime('+1 day'),
                'path' => '',
                'domain' => '',
                'secure' => false,
                'httponly' => false,
                'samesite' => null // Or one of CookieInterface::SAMESITE_* constants
            ]
        ));
        $this->response = $this->response->withCookie(Cookie::create(
            'blockchain',
            0,
            // All keys are optional
            [
                'expires' => new DateTime('+1 day'),
                'path' => '',
                'domain' => '',
                'secure' => false,
                'httponly' => false,
                'samesite' => null // Or one of CookieInterface::SAMESITE_* constants
            ]
        ));
    }

}


