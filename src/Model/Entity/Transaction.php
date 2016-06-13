<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity.
 *
 * @property int $id
 * @property string $data_id
 * @property \App\Model\Entity\Data $data
 * @property int $company_id
 * @property \App\Model\Entity\Company $company
 * @property \Cake\I18n\Time $transaction_at
 * @property int $area_id
 * @property \App\Model\Entity\Area $area
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Transaction extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
