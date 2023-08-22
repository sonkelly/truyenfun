<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chapter Entity
 *
 * @property int $chap_id
 * @property int $tale_id
 * @property string $chap_name
 * @property int $chap_index
 * @property string $chap_content
 * @property \Cake\I18n\FrozenTime|null $create_time
 * @property \Cake\I18n\FrozenTime|null $update_time
 */
class Chapter extends Entity
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
        'tale_id' => true,
        'chap_name' => true,
        'chap_index' => true,
        'chap_content' => true,
        'create_time' => true,
        'update_time' => true,
    ];
}
