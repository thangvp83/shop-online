<?php
namespace Admin\Controller;

use Admin\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Products Controller
 *
 * @property \Admin\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{

    public $cate_model;
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Admin.Categories');
    }
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->viewBuilder()->layout('Admin.default');
        $this->paginate = [
            'contain' => ['Categories']
        ];

        //$products = $this->paginate($this->Products);
        $products = $this->Products->find();
        
        $this->set('products', $products);
        $this->set('_serialize', ['products']);
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('Admin.default');
        $product = $this->Products->get($id, [
            'contain' => ['Categories']
        ]);
        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
//        debug($this->request->data);die;
        $this->viewBuilder()->layout('Admin.default');
        $product = $this->Products->newEntity();
        if($id)
        { // if edit method
            $product = $this->Products->get($id)->accessible('group', true)->accessible('status', true);
        }
        if ($this->request->is(['patch', 'post', 'put'])){
            $product = $this->Core->patchEntity($product, $this->request->data);
            debug($product);die();
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Categories->getCategoriesForProduct();

        $this->buildHasMany($product,'cards',['container'=>'#listCard','add'=>'.btn_add','delete'=>'.btn_delete']);


        $this->set(compact('product', 'categories'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('Admin.default');
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Core->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved'));
                return $this->redirect(['plugin' => 'admin', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved'));
            }
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categories'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted'));
        } else {
            $this->Flash->error(__('The product could not be deleted'));
        }
        return $this->redirect(['plugin' => 'admin','action' => 'index']);
    }
}
