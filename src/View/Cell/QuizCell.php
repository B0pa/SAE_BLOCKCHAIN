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
        $selectedAnswers = $session->read('selectedAnswers');

        if (isset($selectedAnswers[$count])) {
            $selectedAnswer = $selectedAnswers[$count];
        } else {
            $selectedAnswer = null;
        }

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
            $numberOfQuizzes = count($quizzes);
            $session->write('numberOfQuizzes', $numberOfQuizzes);
        }
        if ($url === 'quizzcrypto') {
            $cookie = $this->request->getCookie('cryptoLevel');
            if ($cookie > 0) {
                $quizzes = $quizzesTable->find()
                    ->contain(['Answers'])
                    ->where(['category' => "crypto", 'level' => $cookie])
                    ->toArray();
            }else {
                $quizzes = $quizzesTable->find()
                    ->contain(['Answers'])
                    ->where(['category' => "crypto"])
                    ->toArray();
            }
            $numberOfQuizzes = count($quizzes);
            $session->write('numberOfQuizzes', $numberOfQuizzes);
        }
        if ($url === 'quizz-n-f-t') {
            $cookie = $this->request->getCookie('nftLevel');
            if ($cookie > 0) {
                $quizzes = $quizzesTable->find()
                    ->contain(['Answers'])
                    ->where(['category' => "nft", 'level' => $cookie])
                    ->toArray();
            }else {
                $quizzes = $quizzesTable->find()
                    ->contain(['Answers'])
                    ->where(['category' => "nft"])
                    ->toArray();
            }
            $numberOfQuizzes = count($quizzes);
            $session->write('numberOfQuizzes', $numberOfQuizzes);
        }
        if ($url === 'quizz-danger') {
            $cookie = $this->request->getCookie('dangerLevel');
            if ($cookie > 0) {
                $quizzes = $quizzesTable->find()
                    ->contain(['Answers'])
                    ->where(['category' => "danger", 'level' => $cookie])
                    ->toArray();
            }else {
                $quizzes = $quizzesTable->find()
                    ->contain(['Answers'])
                    ->where(['category' => "danger"])
                    ->toArray();
            }
            $numberOfQuizzes = count($quizzes);
            $session->write('numberOfQuizzes', $numberOfQuizzes);
        }


        $this->set(compact('quizzes'));
        $this->set(compact('count'));
        $this->set(compact('url'));
        $this->set(compact('selectedAnswer'));
    }
}
