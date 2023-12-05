<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActualitiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActualitiesTable Test Case
 */
class ActualitiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ActualitiesTable
     */
    protected $Actualities;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Actualities',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Actualities') ? [] : ['className' => ActualitiesTable::class];
        $this->Actualities = $this->getTableLocator()->get('Actualities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Actualities);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ActualitiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
