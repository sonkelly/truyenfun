<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $catid
 * @property string $category_name
 * @property string $description
 * @property \Cake\I18n\FrozenTime $createtime
 * @property \Cake\I18n\FrozenTime $updatetime
 */
class Category extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'category_name' => true,
        'description' => true,
        'createtime' => true,
        'updatetime' => true,
    ];
}
