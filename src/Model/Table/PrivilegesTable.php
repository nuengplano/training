<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Privileges Model
 *
 * @property \Cake\ORM\Association\BelongsTo $UsersPrivileges
 * @property \Cake\ORM\Association\BelongsToMany $Members
 * @property \Cake\ORM\Association\BelongsToMany $CarTypes
 * @property \Cake\ORM\Association\BelongsToMany $MeetingPoints
 * @property \Cake\ORM\Association\BelongsToMany $Places
 * @property \Cake\ORM\Association\BelongsToMany $ServiceRequires
 * @property \Cake\ORM\Association\BelongsToMany $Users
 * @property \Cake\ORM\Association\BelongsToMany $PrivilegesEmails
 *
 * @method \App\Model\Entity\Privilege get($primaryKey, $options = [])
 * @method \App\Model\Entity\Privilege newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Privilege[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Privilege|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Privilege patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Privilege[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Privilege findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PrivilegesTable extends Table
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

        $this->setTable('privileges');
        $this->setDisplayField('id');
        $this->setPrimaryKey(['id']);

        $this->addBehavior('Timestamp');

        $this->belongsTo('PrivilegesCategories', [
            'foreignKey' => 'privileges_categories_code'
        ]);

        $this->hasMany("PrivilegesImages", [
            'foreignKey' => 'privileges_id'
        ]);
        $this->belongsToMany('MeetingPoints', [
            'joinTable' => 'privileges_meeting_points',
            'foreignKey' => 'privileges_code',
            'targetForeignKey' => 'meeting_points_code'
        ]);

        $this->belongsTo('MembersPrivileges', [
            'foreignKey' => 'privileges_code',
            'bindingKey' => 'privileges_code'
        ]);

        $this->hasMany('ServiceRequires', [
            'foreignKey' => 'privilege_code',
            'bindingKey' => 'privileges_code'
        ]);

        $this->hasMany('PrivilegesEmails', [
            'foreignKey' => 'privilege_code',
            'bindingKey' => 'privileges_code'
        ]);

        $this->hasMany('Reservations', ['foreignKey'=> 'privilege_code', 'bindingKey' => 'privileges_code']);

        $this->belongsTo('RefProvinces', ['foreignKey' => 'province_code']);


        $this->belongsToMany('CarTypes', [
            'joinTable' => 'privileges_car_types',
            'foreignKey' => 'privileges_code',
            'targetForeignKey' => 'car_types_code'
        ]);

        $this->belongsToMany('Places', [
            'joinTable' => 'privileges_places',
            'foreignKey' => 'privileges_code',
            'targetForeignKey' => 'places_code'
        ]);

        $this->hasMany('PrivilegesTrans', [
            'foreignKey' => 'privileges_id'
        ]);

        $this->hasMany("PrivilegesImages", [
            'foreignKey' => 'privileges_id'
        ]);

        $this->belongsTo("UsersPrivileges", [
            'foreignKey' => 'users_privileges_id'
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
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->boolean('is_active')
            ->allowEmpty('is_active');

        $validator
            ->allowEmpty('company');

        $validator
            ->allowEmpty('company_profile_path');

        $validator
            ->allowEmpty('company_map_path');

        $validator
            ->allowEmpty('privileges_code');

        $validator
            ->allowEmpty('logo');

        $validator
            ->allowEmpty('tel');

        $validator
            ->allowEmpty('mobile_no');

        $validator
            ->allowEmpty('website');

        $validator
            ->allowEmpty('lat');

        $validator
            ->allowEmpty('long');

        $validator
            ->allowEmpty('address');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('overviews');

        $validator
            ->allowEmpty('privileges_categories_code');

        $validator
            ->allowEmpty('business_type');

        $validator
            ->allowEmpty('status');

        $validator
            ->allowEmpty('start_date');

        $validator
            ->allowEmpty('end_date');

        $validator
            ->allowEmpty('fax');

        $validator
            ->allowEmpty('first_name');

        $validator
            ->allowEmpty('last_name');

        $validator
            ->allowEmpty('nationality_code');

        $validator
            ->allowEmpty('comment');

        $validator
            ->allowEmpty('province_code');

        $validator
            ->allowEmpty('district_code');

        $validator
            ->allowEmpty('sub_district');

        $validator
            ->allowEmpty('postal');

        $validator
            ->integer('reservation_policy')
            ->allowEmpty('reservation_policy');

        $validator
            ->integer('cancellation_policy')
            ->allowEmpty('cancellation_policy');

        $validator
            ->allowEmpty('policy');

        $validator
            ->integer('rating_total')
            ->allowEmpty('rating_total');

        $validator
            ->integer('member_total')
            ->allowEmpty('member_total');

        $validator
            ->allowEmpty('operating_hours');

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
//        $rules->add($rules->existsIn(['users_privileges_id'], 'UsersPrivileges'));
        $rules->add($rules->existsIn(['privileges_id'], 'PrivilegesImages'));
        return $rules;
    }
}
