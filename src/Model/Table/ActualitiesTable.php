<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Actualities Model
 *
 * @method \App\Model\Entity\Actuality newEmptyEntity()
 * @method \App\Model\Entity\Actuality newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Actuality> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Actuality get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Actuality findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Actuality patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Actuality> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Actuality|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Actuality saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Actuality>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Actuality>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Actuality>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Actuality> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Actuality>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Actuality>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Actuality>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Actuality> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ActualitiesTable extends Table
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

        $this->setTable('actualities');
        $this->setDisplayField('title');
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
            ->scalar('title')
            ->maxLength('title', 255)
            ->allowEmptyString('title');

        $validator
            ->scalar('text')
            ->allowEmptyString('text');

        $validator
            ->scalar('link')
            ->maxLength('link', 255)
            ->allowEmptyString('link');

        $validator
            ->scalar('img')
            ->maxLength('img', 255)
            ->allowEmptyString('img');

        return $validator;
    }
}
