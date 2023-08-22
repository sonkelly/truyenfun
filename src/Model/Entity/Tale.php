<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tale Entity
 *
 * @property int $tale_id
 * @property string $tale_name
 * @property string $tale_author
 * @property string $category_ids
 * @property string $tale_introduce
 * @property string $tale_source
 * @property int $status
 * @property int $tale_assess
 * @property string $chap_path
 * @property string|resource $avatar
 * @property \Cake\I18n\FrozenTime $createtime
 * @property \Cake\I18n\FrozenTime $updatetime
 */
class Tale extends Entity
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
        'tale_name' => true,
        'tale_author' => true,
        'category_ids' => true,
        'tale_introduce' => true,
        'tale_source' => true,
        'status' => true,
        'tale_assess' => true,
        'avatar' => true,
        'createtime' => true,
        'updatetime' => true,
    ];
}
