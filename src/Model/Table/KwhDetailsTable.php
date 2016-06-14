<?php

namespace App\Model\Table;

use App\Model\Entity\KwhDetail;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * KwhDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CommonInfos
 * @property \Cake\ORM\Association\BelongsTo $Companies
 * @property \Cake\ORM\Association\BelongsTo $Customers
 */
class KwhDetailsTable extends Table
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

        $this->table('kwh_details');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

//        $this->belongsTo('CommonInfos', [
//            'foreignKey' => 'common_info_id',
//            'joinType' => 'INNER'
//        ]);
//        $this->belongsTo('Companies', [
//            'foreignKey' => 'company_id',
//            'joinType' => 'INNER'
//        ]);
//        $this->belongsTo('Customers', [
//            'foreignKey' => 'customer_id',
//            'joinType' => 'INNER'
//        ]);
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
//        $rules->add($rules->existsIn(['common_info_id'], 'CommonInfos'));
//        $rules->add($rules->existsIn(['company_id'], 'Companies'));
//        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        return $rules;
    }

    public function saveDetails($commonInfoId, $type, $kwhs, $companyId = null, $customerId = null)
    {
        foreach ($kwhs as $val) {
            $data = $this->newEntity();
            $data->common_info_id = $commonInfoId;
            $data->company_id = $companyId;
            $data->customer_id = $customerId;
            $data->type = $type;
            
            $data->time_level = array_shift($val);
            $data->kwh = array_shift($val);
            if(!empty($val)) {
                $data->field1 = array_shift($val);
            }
//            debug($data);
            $this->save($data);
        }
        
        return true;
    }

}
