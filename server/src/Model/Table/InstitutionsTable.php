<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Institutions Model
 *
 * @property \App\Model\Table\TypeOfInstitutionsTable|\Cake\ORM\Association\BelongsTo $TypeOfInstitutions
 * @property \App\Model\Table\ArticlesTable|\Cake\ORM\Association\HasMany $Articles
 * @property \App\Model\Table\UsersInstituitionsTable|\Cake\ORM\Association\HasMany $UsersInstituitions
 *
 * @method \App\Model\Entity\Institution get($primaryKey, $options = [])
 * @method \App\Model\Entity\Institution newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Institution[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Institution|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Institution|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Institution patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Institution[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Institution findOrCreate($search, callable $callback = null, $options = [])
 */
class InstitutionsTable extends Table
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

        $this->setTable('institutions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TypeOfInstitutions', [
            'foreignKey' => 'type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Articles', [
            'foreignKey' => 'institution_id'
        ]);
        $this->hasMany('UsersInstituitions', [
            'foreignKey' => 'institution_id'
        ]);
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
            ->scalar('city')
            ->maxLength('city', 255)
            ->requirePresence('city', 'create')
            ->notEmpty('city');

        $validator
            ->scalar('state')
            ->maxLength('state', 255)
            ->requirePresence('state', 'create')
            ->notEmpty('state');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['type_id'], 'TypeOfInstitutions'));

        return $rules;
    }
}
