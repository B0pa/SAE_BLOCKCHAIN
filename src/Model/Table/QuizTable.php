<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quiz Model
 *
 * @method \App\Model\Entity\Quiz newEmptyEntity()
 * @method \App\Model\Entity\Quiz newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Quiz> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Quiz get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Quiz findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Quiz patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Quiz> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Quiz|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Quiz saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Quiz>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Quiz>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Quiz>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Quiz> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Quiz>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Quiz>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Quiz>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Quiz> deleteManyOrFail(iterable $entities, array $options = [])
 */
class QuizTable extends Table
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

        $this->setTable('quiz');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('question')
            ->maxLength('question', 255)
            ->allowEmptyString('question');

        $validator
            ->scalar('answer1')
            ->maxLength('answer1', 255)
            ->allowEmptyString('answer1');

        $validator
            ->scalar('answer2')
            ->maxLength('answer2', 255)
            ->allowEmptyString('answer2');

        $validator
            ->scalar('answer3')
            ->maxLength('answer3', 255)
            ->allowEmptyString('answer3');

        $validator
            ->scalar('questionform')
            ->maxLength('questionform', 45)
            ->allowEmptyString('questionform');

        $validator
            ->scalar('category')
            ->maxLength('category', 45)
            ->allowEmptyString('category');

        return $validator;
    }
}
