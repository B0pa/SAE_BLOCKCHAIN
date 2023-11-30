<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BlockchainArticle Model
 *
 * @method \App\Model\Entity\BlockchainArticle newEmptyEntity()
 * @method \App\Model\Entity\BlockchainArticle newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\BlockchainArticle> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BlockchainArticle get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\BlockchainArticle findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\BlockchainArticle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\BlockchainArticle> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BlockchainArticle|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\BlockchainArticle saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\BlockchainArticle>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BlockchainArticle>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BlockchainArticle>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BlockchainArticle> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BlockchainArticle>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BlockchainArticle>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BlockchainArticle>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BlockchainArticle> deleteManyOrFail(iterable $entities, array $options = [])
 */
class BlockchainArticleTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('blockchain_article');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('niveau')
            ->allowEmptyString('niveau');

        $validator
            ->integer('id')
            ->allowEmptyString('id');

        $validator
            ->scalar('titre')
            ->maxLength('titre', 255)
            ->allowEmptyString('titre');

        $validator
            ->scalar('contenue')
            ->maxLength('contenue', 255)
            ->allowEmptyString('contenue');

        $validator
            ->allowEmptyFile('image');

        return $validator;
    }
}
