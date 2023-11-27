<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BlockchainArticleFixture
 */
class BlockchainArticleFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'blockchain_article';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'niveau' => 1,
                'id' => 1,
                'titre' => 'Lorem ipsum dolor sit amet',
                'contenue' => 'Lorem ipsum dolor sit amet',
                'image' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
