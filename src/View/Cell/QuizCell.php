<?php

namespace App\View\Cell;

use Cake\View\Cell;
use Cake\ORM\TableRegistry;

/**
 * Quiz cell
 */
class QuizCell extends Cell
{

    public function display() {
        $session = $this->request->getSession();
        $count = $session->check('count') ? $session->read('count') : 0;
        $url = $session->check('currentURL') ? $session->read('currentURL') : 'defaultURL';
        
        $quizzesTable = $this->fetchTable('Quizzes');
        $quizzes = [];

        $this->set('count', $count);
        $this->set('url', $url);
        
        if ($url === 'quizz-blockchain') {
            $cookie = $this->request->getCookie('blockchainLevel'); 
            if ($cookie > 0) {
                $quizzes = $quizzesTable->find()
                ->contain(['Answers'])
                ->where(['category' => "blockchain", 'level' => $cookie])
                ->toArray();
            }else {
                $quizzes = $quizzesTable->find()
                ->contain(['Answers'])
                ->where(['category' => "blockchain"])
                ->toArray();
            }
           
        }
        if ($url === 'quizz_crypto') {
            $quizzes = $quizzesTable->find()
            ->contain(['Answers'])
            ->where(['category' => "crypto"]);
        }
        if ($url === 'quizz_nft') {
            $quizzes = $quizzesTable->find()
            ->contain(['Answers'])
            ->where(['category' => "nft"]);
        }
        if ($url === 'quizz_danger') {
            $quizzes = $quizzesTable->find()
            ->contain(['Answers'])
            ->where(['category' => "danger"]);
        }


        $selectedAnswers = [];
        $this->set(compact('quizzes'));
        $this->set(compact('selectedAnswers'));
        $this->set(compact('count'));
        $this->set(compact('url'));
    }



}
