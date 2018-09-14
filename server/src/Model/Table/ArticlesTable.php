<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Articles Model
 *
 * @property \App\Model\Table\CategoryOfArticlesTable|\Cake\ORM\Association\BelongsTo $CategoryOfArticles
 * @property \App\Model\Table\InstitutionsTable|\Cake\ORM\Association\BelongsTo $Institutions
 * @property \App\Model\Table\AreasTable|\Cake\ORM\Association\BelongsTo $Areas
 * @property \App\Model\Table\AuthorsTable|\Cake\ORM\Association\BelongsToMany $Authors
 * @property \App\Model\Table\KeywordsTable|\Cake\ORM\Association\BelongsToMany $Keywords
 *
 * @method \App\Model\Entity\Article get($primaryKey, $options = [])
 * @method \App\Model\Entity\Article newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Article[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Article|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Article|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Article patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Article[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Article findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ArticlesTable extends Table
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

        $this->setTable('articles');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CategoryOfArticles', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Institutions', [
            'foreignKey' => 'institution_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Areas', [
            'foreignKey' => 'area_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Authors', [
            'foreignKey' => 'article_id',
            'targetForeignKey' => 'author_id',
            'joinTable' => 'authors_articles'
        ]);
        $this->belongsToMany('Keywords', [
            'foreignKey' => 'article_id',
            'targetForeignKey' => 'keyword_id',
            'joinTable' => 'keywords_articles'
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
            ->integer('title')
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->integer('year')
            ->requirePresence('year', 'create')
            ->notEmpty('year');

        $validator
            ->scalar('archive')
            ->maxLength('archive', 255)
            ->requirePresence('archive', 'create')
            ->notEmpty('archive');

        $validator
            ->integer('approved')
            ->requirePresence('approved', 'create')
            ->notEmpty('approved');

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
        $rules->add($rules->existsIn(['category_id'], 'CategoryOfArticles'));
        $rules->add($rules->existsIn(['institution_id'], 'Institutions'));
        $rules->add($rules->existsIn(['area_id'], 'Areas'));

        return $rules;
    }
}
