<?php
App::uses('AppController', 'Controller');
/**
 * Labels Controller
 *
 * @property Label $Label
 */
class LabelsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Label->recursive = 0;
		$this->set('labels', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Label->id = $id;
		if (!$this->Label->exists()) {
			throw new NotFoundException(__('Invalid label'));
		}
		$this->set('label', $this->Label->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Label->create();
			if ($this->Label->save($this->request->data)) {
				$this->Session->setFlash(__('The label has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The label could not be saved. Please, try again.'));
			}
		}
		$positions = $this->Label->Position->find('list');
		$shelves = $this->Label->Shelf->find('list');
		$products = $this->Label->Product->find('list');
		$aisles = $this->Label->Aisle->find('list');
		$this->set(compact('positions', 'shelves', 'products', 'aisles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Label->id = $id;
		if (!$this->Label->exists()) {
			throw new NotFoundException(__('Invalid label'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Label->save($this->request->data)) {
				$this->Session->setFlash(__('The label has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The label could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Label->read(null, $id);
		}
		$positions = $this->Label->Position->find('list');
		$shelves = $this->Label->Shelf->find('list');
		$products = $this->Label->Product->find('list');
		$aisles = $this->Label->Aisle->find('list');
		$this->set(compact('positions', 'shelves', 'products', 'aisles'));
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
		$this->Label->id = $id;
		if (!$this->Label->exists()) {
			throw new NotFoundException(__('Invalid label'));
		}
		if ($this->Label->delete()) {
			$this->Session->setFlash(__('Label deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Label was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}