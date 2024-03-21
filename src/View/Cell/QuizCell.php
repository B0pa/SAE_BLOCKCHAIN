<?php

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Quiz cell
 */
class QuizCell extends Cell
{

    public function display() {
        $session = $this->request->getSession();
        $count = $session->check('count') ? $session->read('count') : 0;
        $url = $session->read('currentURL') ? $session->read('currentURL') : 'defaultURL';


        $this->set('count', $count);
        $this->set('url', $url);



        $quizzesTable = $this->fetchTable('Quizzes');

        $quizzes = $quizzesTable->find()
            ->contain(['Answers']);


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
