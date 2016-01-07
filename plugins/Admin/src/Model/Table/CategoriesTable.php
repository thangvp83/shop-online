<?php
namespace Admin\Model\Table;

use Admin\Model\Entity\Category;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Categories Model
 *
 * @property \Cake\ORM\Association\HasMany $Products
 */
class CategoriesTable extends Table
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

        $this->table('categories');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Products', [
//            'foreignKey' => 'category_id',
            'className' => 'Admin.Products'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
        $validator
            ->add('parent_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('parent_id', 'create');

        $validator
            ->add('feature', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('feature');

        $validator
            ->add('name', ['unique' =>
                [
//                    'required' => false,
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => __('This Category Name Is Exist !')
                ]
            ])
            ->notEmpty('name');


        $validator
            ->notEmpty('description');

        $validator
            ->allowEmpty('image');

        $validator
            ->allowEmpty('thumbnail');

        $validator
            ->add('status', 'valid', ['rule' => 'boolean'])
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }

    public function getAllCategories()
    {
        $data = array();
        $result = $this->find()
            ->select(['id', 'name', 'parent_id'])
            ->where(['status' => ACTIVE_STATUS])
            ->toArray();
        if($result) {
            /*foreach ($result as $item) {
                $data[$item['id']] = $item['name'];
            }*/
            $data = cate_patent($result, 0);
        }
        return $data;
    }

    public function getCategoriesForProduct()
    {
        $data = array();
        $result = $this->find()
            ->select(['id', 'parent_id', 'name'])
            ->where(['status' => ACTIVE_STATUS])
            ->toArray();
        if($result) {
            foreach ($result as $item) {
                if($item['parent_id'] == 0){
                    $data[$item['id']] = $item['name'];
                    foreach ($result as $sub_cate) {
                        if($sub_cate['parent_id'] == $item['id']){
                            $data[$sub_cate['id']] = '__ '.$sub_cate['name'];
                        }
                    }
                }

            }
        }
        return $data;
    }
}
