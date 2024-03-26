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
            $quizzes = $quizzesTable->find()
            ->contain(['Answers'])
            ->where(['category' => "blockchain"]);
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

        $quiz_lvl1 = [];
        $quiz_lvl2 = [];
        $quiz_lvl3 = [];

        foreach ($quizzes as $quiz) {
            if($quiz->level === 1) {
                $quiz_lvl1[] = $quiz;
            }
            elseif ($quiz->level === 2) {
                $quiz_lvl2[] = $quiz;
            }
            elseif ($quiz->level === 3) {
                $quiz_lvl3[] = $quiz;
            }
        }

        $this->set('quiz_lvl1', $quiz_lvl1);
        $this->set('quiz_lvl2', $quiz_lvl2);
        $this->set('quiz_lvl3', $quiz_lvl3);

        $selectedAnswers = [];

        $this->set(compact('selectedAnswers'));
        $this->set(compact('count'));
        $this->set(compact('url'));
    }



}
