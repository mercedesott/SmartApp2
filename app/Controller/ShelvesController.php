<?php
App::uses('AppController', 'Controller');
/**
 * Shelves Controller
 *
 * @property Shelf $Shelf
 */
class ShelvesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Shelf->recursive = 0;
		$this->set('shelves', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Shelf->id = $id;
		if (!$this->Shelf->exists()) {
			throw new NotFoundException(__('Invalid shelf'));
		}
		$this->set('shelf', $this->Shelf->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Shelf->create();
			if ($this->Shelf->save($this->request->data)) {
				$this->Session->setFlash(__('The shelf has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shelf could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Shelf->id = $id;
		if (!$this->Shelf->exists()) {
			throw new NotFoundException(__('Invalid shelf'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Shelf->save($this->request->data)) {
				$this->Session->setFlash(__('The shelf has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shelf could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Shelf->read(null, $id);
		}
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
		$this->Shelf->id = $id;
		if (!$this->Shelf->exists()) {
			throw new NotFoundException(__('Invalid shelf'));
		}
		if ($this->Shelf->delete()) {
			$this->Session->setFlash(__('Shelf deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Shelf was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function isAuthorized($user) {
		if (isset($user['active']) && $user['active'] == true) {
		//Reponedor puede acceder a todas las acciones que tengan que ver con los estantes
			if (isset($user['user_type_id']) && $user['user_type_id'] === '4') {
				return true;
			}
		}
		//Default deny
		return parent::isAuthorized($user);
	}
	
	public function externalShelfAdd() {
		$parametros = $this->request->data;
		$descripcionexterna = $parametros['description'];
		
		$this->Shelf->create();
		$this->Shelf->save(array('Shelf'=>array('description' => $descripcionexterna)));
	}
	
	public function externalShelfEdit() {
		$parametros = $this->request->data;
		
		$estantevieja = $parametros['estantevieja'];
		$descripcion = $parametros['descripcion'];
		
		$tupla = $this->Shelf->find('first', array('conditions' => array("Shelf.description" => $estantevieja)));
		
		$estante_id = $tupla['Shelf']['id'];
		$this->Shelf->id = $estante_id;
		$this->Shelf->saveField('description', $descripcion);
	}
	
	public function externalShelfDelete() {
		$parametros = $this->request->data;
		
		$descripcion = $parametros['descripcion'];
		
		$estante = $this->Shelf->find('first', array('conditions' => array("Shelf.description" => $descripcion)));
		
		$this->Shelf->id = $estante['Shelf']['id'];
		$this->Shelf->delete();
	}
}
