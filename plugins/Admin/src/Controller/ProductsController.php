<?php
namespace Admin\Controller;

use Admin\Controller\AppController;

/**
 * Products Controller
 *
 * @property \Admin\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->layout = 'Admin.default';
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
        $this->layout = 'Admin.default';
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
    public function add()
    {
        $this->layout = 'Admin.default';
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Core->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved'));
                return $this->redirect(['plugin' => 'admin','action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved'));
            }
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
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
        $this->layout = 'Admin.default';
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
