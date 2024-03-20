<?php

namespace App\View\Cell;

use App\Model\Table\ActualitiesTable;
use Cake\View\Cell;

class ArticleCell extends Cell
{

    public function display() {
        /** @var ActualitiesTable $actualities */
        $actualities = $this->fetchTable('Actualities');

        $actus = $actualities->find()->order(['id' => 'ASC'])->limit(1)->toArray();
        $this->set(compact('actus'));
    }

}
