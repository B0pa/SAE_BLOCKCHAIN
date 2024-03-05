<?php
namespace App\View\Helper;

use Cake\View\Helper;

class AuthenticationHelper extends Helper
{
    public function getIdentity()
    {
        // Ici, vous pouvez ajouter le code pour obtenir l'identité de l'utilisateur.
        // Par exemple, vous pouvez utiliser la session pour obtenir l'identité de l'utilisateur.
        $session = $this->_View->getRequest()->getSession();
        $identity = $session->read('Auth');

        return $identity;
    }

    public function isLoggedIn()
    {
        $identity = $this->getIdentity();

        return !empty($identity);
    }
}
