<?php 

// src/Controller/Component/DatabaseComponent.php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Datasource\ConnectionManager;

class DatabaseComponent extends Component
{
    public function checkConnection()
    {
        try {
            $connection = ConnectionManager::get('default');
            $connected = $connection->connect();
            return $connected;
        } catch (\Exception $e) {
            return false;
        }
    }
}
