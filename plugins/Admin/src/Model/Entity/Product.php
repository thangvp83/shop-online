<?php
namespace Admin\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity.
 */
class Product extends Entity
{
    /*
    public $imageFields = [
        'avatar' => [
            'size' => 1048576, // 1 MB
            'extensions' => ['jpg', 'png'],
            'required' => false
        ]
    ]; 
    */
    

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     * Note that '*' is set to true, which allows all unspecified fields to be
     * mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
