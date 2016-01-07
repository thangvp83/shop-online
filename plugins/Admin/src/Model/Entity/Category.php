<?php
namespace Admin\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity.
 *
 * @property int $id
 * @property int $parent_id
 * @property bool $feature
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $thumbnail
 * @property bool $status
 * @property \Cake\I18n\Time $created
 * @property \Admin\Model\Entity\Product[] $products
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
     * @var array
     */

    public $imageFields = [
        'image' => [
            'size' => 3145728, //3*1024*1024 B
            'extensions' => ['jpg', 'png', 'gif'],
            'required' => true
        ]
    ];

    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
