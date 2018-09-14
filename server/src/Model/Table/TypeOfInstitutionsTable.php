<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypeOfInstitutions Model
 *
 * @method \App\Model\Entity\TypeOfInstitution get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypeOfInstitution newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypeOfInstitution[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypeOfInstitution|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypeOfInstitution|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypeOfInstitution patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypeOfInstitution[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypeOfInstitution findOrCreate($search, callable $callback = null, $options = [])
 */
class TypeOfInstitutionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('type_of_institutions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('label')
            ->maxLength('label', 255)
            ->requirePresence('label', 'create')
            ->notEmpty('label');

        return $validator;
    }
}
