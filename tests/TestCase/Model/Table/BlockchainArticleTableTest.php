<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BlockchainArticleTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BlockchainArticleTable Test Case
 */
class BlockchainArticleTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BlockchainArticleTable
     */
    protected $BlockchainArticle;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.BlockchainArticle',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('BlockchainArticle') ? [] : ['className' => BlockchainArticleTable::class];
        $this->BlockchainArticle = $this->getTableLocator()->get('BlockchainArticle', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->BlockchainArticle);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BlockchainArticleTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
