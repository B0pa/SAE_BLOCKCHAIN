<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Answers Model
 *
 * @method \App\Model\Entity\Answer newEmptyEntity()
 * @method \App\Model\Entity\Answer newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Answer> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Answer get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Answer findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Answer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Answer> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Answer|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Answer saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Answer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Answer>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Answer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Answer> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Answer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Answer>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Answer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Answer> deleteManyOrFail(iterable $entities, array $options = [])
 */
class AnswersTable extends Table
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

        // Ajouter cette ligne pour définir l'association belongsTo avec le modèle Quiz
        $this->belongsTo('Quizzes');
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
            ->scalar('answer')
            ->maxLength('answer', 255)
            ->requirePresence('answer', 'create')
            ->notEmptyString('answer');

       $validator
            ->integer('num')
            ->requirePresence('num', 'create')
            ->notEmptyString('num');

        return $validator;
    }
}
