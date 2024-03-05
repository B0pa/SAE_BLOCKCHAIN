<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuizzesFixture
 */
class QuizzesFixture extends TestFixture
{
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
                'realanswer' => 'Lorem ipsum dolor sit amet',
                'questionform' => 'Lorem ipsum dolor sit amet',
                'category' => 'Lorem ipsum dolor sit amet',
                'csv_link' => 'Lorem ipsum dolor sit amet',
                'csv_columne' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
