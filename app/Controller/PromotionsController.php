<?php
App::uses('AppController', 'Controller');
/**
 * Promotions Controller
 *
 * @property Promotion $Promotion
 */
class PromotionsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Promotion->recursive = 0;
		$this->set('promotions', $this->paginate());
	}
	
		public function search(){
		
		$products = $this->paginate(array("Product.name LIKE "=> "%".$this->request->data['Product']['search']."%"));
               $this->set('products', $products);
               $this->render('index');
	}
	
		public function autocompletar(){
		$products = $this->paginate(array("Product.name LIKE "=> "%".$this->request->query['term']."%"));
		$this->autoRender=false;
		echo json_encode($products);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Promotion->id = $id;
		if (!$this->Promotion->exists()) {
			throw new NotFoundException(__('Invalid promotion'));
		}
		$this->set('promotion', $this->Promotion->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Promotion->create();
			if ($this->Promotion->save($this->request->data)) {
				$this->Session->setFlash(__('The promotion has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The promotion could not be saved. Please, try again.'));
			}
		}
		$products = $this->Promotion->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Promotion->id = $id;
		if (!$this->Promotion->exists()) {
			throw new NotFoundException(__('Invalid promotion'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Promotion->save($this->request->data)) {
				$this->Session->setFlash(__('The promotion has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The promotion could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Promotion->read(null, $id);
		}
		$products = $this->Promotion->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Promotion->id = $id;
		if (!$this->Promotion->exists()) {
			throw new NotFoundException(__('Invalid promotion'));
		}
		if ($this->Promotion->delete()) {
			$this->Session->setFlash(__('Promotion deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Promotion was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function verpromo($id = null) {
		$this->set('promotions', $this->paginate('Promotion', array('Promotion.product_id' => $id)));
		$this->render('index');
	}
	
	public function report() {
		if ($this->request->is('post')) {
			//var_dump($this->request->data);
			//$promotions = $this->paginate(array("Promotion.start_date >= " => $this->request->data['Promotion']['start_date']."AND Promotion.start_date <=" => $this->request->data['Promotion']['finish_date']));
			$start_date = $this->request->data['Promotion']['start_date']['year'].'-'.$this->request->data['Promotion']['start_date']['month'].'-'.$this->request->data['Promotion']['start_date']['day'];
			$finish_date = $this->request->data['Promotion']['finish_date']['year'].'-'.$this->request->data['Promotion']['finish_date']['month'].'-'.$this->request->data['Promotion']['finish_date']['day'];
			$promotions = $this->paginate(array("Promotion.start_date >= " => $start_date, "Promotion.start_date <=" => $finish_date));
			$this->set('promotions', $promotions);
			$this->render('index');
		}
	}
}
