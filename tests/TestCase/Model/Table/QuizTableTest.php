<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuizTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuizTable Test Case
 */
class QuizTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QuizTable
     */
    protected $Quiz;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Quiz',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Quiz') ? [] : ['className' => QuizTable::class];
        $this->Quiz = $this->getTableLocator()->get('Quiz', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Quiz);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\QuizTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
