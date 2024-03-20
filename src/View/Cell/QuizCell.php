<?php

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Quiz cell
 */
class QuizCell extends Cell
{

    public function display($count) {

        $this->set('count', $count);



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
    }



}
