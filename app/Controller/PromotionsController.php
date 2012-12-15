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
}
