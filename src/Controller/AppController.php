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
use Cake\Http\Cookie\CookieCollection;

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
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->defineCookie();
    }

    public function initialize(): void
    {

        parent::initialize();

        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }


    public function defineCookie()
    {
        $cookie = $this->request->getCookie('validation');
        if ($cookie == null) {
            $validation_cookie = Cookie::create(
                'validation',
                0,
                // All keys are optional
                [
                    'expires' => new DateTime('+1 day'),
                    'path' => '/',
                    'domain' => '',
                    'secure' => false,
                    'httponly' => false,
                    'samesite' => null // Or one of CookieInterface::SAMESITE_* constants
                ]
            );
            $this->response = $this->response->withCookie($validation_cookie);
        }

        $cookie = $this->request->getCookie('nft');
        if ($cookie == null) {
            $nft_cookie = Cookie::create(
                'nft',
                0,
                // All keys are optional
                [
                    'expires' => new DateTime('+1 day'),
                    'path' => '/',
                    'domain' => '',
                    'secure' => false,
                    'httponly' => false,
                    'samesite' => null // Or one of CookieInterface::SAMESITE_* constants
                ]
            );
            $this->response = $this->response->withCookie($nft_cookie);
        }
        $cookie = $this->request->getCookie('crypto');
        if ($cookie == null) {
            $crypto_cookie = Cookie::create(
                'crypto',
                0,
                // All keys are optional
                [
                    'expires' => new DateTime('+1 day'),
                    'path' => '/',
                    'domain' => '',
                    'secure' => false,
                    'httponly' => false,
                    'samesite' => null // Or one of CookieInterface::SAMESITE_* constants
                ]
            );
            $this->response = $this->response->withCookie($crypto_cookie);
        }

        $cookie = $this->request->getCookie('danger');
        if ($cookie == null) {
            $danger_cookie = Cookie::create(
                'danger',
                0,
                // All keys are optional
                [
                    'expires' => new DateTime('+1 day'),
                    'path' => '/',
                    'domain' => '',
                    'secure' => false,
                    'httponly' => false,
                    'samesite' => null // Or one of CookieInterface::SAMESITE_* constants
                ]
            );
            $this->response = $this->response->withCookie($danger_cookie);
        }
        $cookie = $this->request->getCookie('blockchain');
        if ($cookie == null) {
            $blockchain_cookie = Cookie::create(
                'blockchain',
                0,
                // All keys are optional
                [
                    'expires' => new DateTime('+1 day'),
                    'path' => '/',
                    'domain' => '',
                    'secure' => false,
                    'httponly' => false,
                    'samesite' => null // Or one of CookieInterface::SAMESITE_* constants
                ]
            );
            $this->response = $this->response->withCookie($blockchain_cookie);
        }
        $cookie = $this->request->getCookie('blockchainLevel');
        if ($cookie == null) {
            $blockchain_level_cookie = Cookie::create(
                'blockchainLevel',
                0,
                // All keys are optional
                [
                    'expires' => new DateTime('+1 day'),
                    'path' => '/',
                    'domain' => '',
                    'secure' => false,
                    'httponly' => false,
                    'samesite' => null // Or one of CookieInterface::SAMESITE_* constants
                ]
            );
            $this->response = $this->response->withCookie($blockchain_level_cookie);
        }
        $cookie = $this->request->getCookie('cryptoLevel');
        if ($cookie == null) {
            $crypto_level_cookie = Cookie::create(
                'cryptoLevel',
                0,
                // All keys are optional
                [
                    'expires' => new DateTime('+1 day'),
                    'path' => '/',
                    'domain' => '',
                    'secure' => false,
                    'httponly' => false,
                    'samesite' => null // Or one of CookieInterface::SAMESITE_* constants
                ]
            );
            $this->response = $this->response->withCookie($crypto_level_cookie);
        }
        $cookie = $this->request->getCookie('dangerLevel');
        if ($cookie == null) {
            $danger_level_cookie = Cookie::create(
                'dangerLevel',
                0,
                // All keys are optional
                [
                    'expires' => new DateTime('+1 day'),
                    'path' => '/',
                    'domain' => '',
                    'secure' => false,
                    'httponly' => false,
                    'samesite' => null // Or one of CookieInterface::SAMESITE_* constants
                ]
            );
            $this->response = $this->response->withCookie($danger_level_cookie);
        }
        $cookie = $this->request->getCookie('nftLevel');
        if ($cookie == null) {
            $nft_level_cookie = Cookie::create(
                'nftLevel',
                0,
                // All keys are optional
                [
                    'expires' => new DateTime('+1 day'),
                    'path' => '/',
                    'domain' => '',
                    'secure' => false,
                    'httponly' => false,
                    'samesite' => null // Or one of CookieInterface::SAMESITE_* constants
                ]
            );
            $this->response = $this->response->withCookie($nft_level_cookie);
        }

    }

}

