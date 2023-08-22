<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tale Model
 *
 * @method \App\Model\Entity\Tale newEmptyEntity()
 * @method \App\Model\Entity\Tale newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Tale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tale get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tale findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Tale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tale[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tale|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tale saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tale[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tale[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tale[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tale[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TaleTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('tale');
        $this->setDisplayField('tale_id');
        $this->setPrimaryKey('tale_id');
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
            ->scalar('tale_name')
            ->maxLength('tale_name', 255)
            ->requirePresence('tale_name', 'create')
            ->notEmptyString('tale_name');

        $validator
            ->scalar('tale_author')
            ->maxLength('tale_author', 255)
            ->requirePresence('tale_author', 'create')
            ->notEmptyString('tale_author');

        $validator
            ->scalar('category_ids')
            ->maxLength('category_ids', 255)
            ->requirePresence('category_ids', 'create')
            ->notEmptyString('category_ids');

        $validator
            ->scalar('tale_introduce')
            ->requirePresence('tale_introduce', 'create')
            ->notEmptyString('tale_introduce');

        $validator
            ->scalar('tale_source')
            ->maxLength('tale_source', 255)
            ->requirePresence('tale_source', 'create')
            ->notEmptyString('tale_source');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->integer('tale_assess')
            ->requirePresence('tale_assess', 'create')
            ->notEmptyString('tale_assess');

        $validator
            ->requirePresence('avatar', 'create')
            ->notEmptyString('avatar');

        $validator
            ->requirePresence('chap_path', 'create')
            ->notEmptyString('chap_path');

        $validator
            ->dateTime('createtime')
            ->allowEmpty('createtime');
        // ->requirePresence('createtime', 'create');
        // ->notEmptyDateTime('createtime');

        $validator
            ->dateTime('updatetime')
            ->allowEmpty('createtime');
        // ->requirePresence('updatetime', 'create')
        // ->notEmptyDateTime('updatetime');

        return $validator;
    }
}