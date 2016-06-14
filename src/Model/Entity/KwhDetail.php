<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * KwhDetail Entity.
 *
 * @property int $id
 * @property int $common_info_id
 * @property \App\Model\Entity\CommonInfo $common_info
 * @property int $company_id
 * @property \App\Model\Entity\Company $company
 * @property int $customer_id
 * @property \App\Model\Entity\Customer $customer
 * @property int $type
 * @property string $time_level
 * @property float $kwh
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class KwhDetail extends Entity
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
