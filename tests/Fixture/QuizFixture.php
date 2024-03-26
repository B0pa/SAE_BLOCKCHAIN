<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuizFixture
 */
class QuizFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'quiz';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'level' => 1,
                'question' => 'Lorem ipsum dolor sit amet',
                'answer1' => 'Lorem ipsum dolor sit amet',
                'answer2' => 'Lorem ipsum dolor sit amet',
                'answer3' => 'Lorem ipsum dolor sit amet',
                'realanswer' => 1,
                'questionform' => 'Lorem ipsum dolor sit amet',
                'category' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
