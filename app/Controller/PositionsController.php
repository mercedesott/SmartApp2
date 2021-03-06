<?php
App::uses('AppController', 'Controller');
/**
 * Positions Controller
 *
 * @property Position $Position
 */
class PositionsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Position->recursive = 0;
		$this->set('positions', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Position->id = $id;
		if (!$this->Position->exists()) {
			throw new NotFoundException(__('Invalid position'));
		}
		$this->set('position', $this->Position->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Position->create();
			if ($this->Position->save($this->request->data)) {
				$this->Session->setFlash(__('The position has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The position could not be saved. Please, try again.'));
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
		$this->Position->id = $id;
		if (!$this->Position->exists()) {
			throw new NotFoundException(__('Invalid position'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Position->save($this->request->data)) {
				$this->Session->setFlash(__('The position has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The position could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Position->read(null, $id);
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
		$this->Position->id = $id;
		if (!$this->Position->exists()) {
			throw new NotFoundException(__('Invalid position'));
		}
		if ($this->Position->delete()) {
			$this->Session->setFlash(__('Position deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Position was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function isAuthorized($user) {
		if (isset($user['active']) && $user['active'] == true) {
		//Reponedor puede acceder a todas las acciones que tengan que ver con las etiquetas y su asignacion con productos
			if (isset($user['user_type_id']) && $user['user_type_id'] === '4') {
				return true;
			}
		}
		//Default deny
		return parent::isAuthorized($user);
	}
	
	public function externalPositionAdd() {
		$parametros = $this->request->data;
		$descripcionexterna = $parametros['description'];
		
		$this->Position->create();
		$this->Position->save(array('Position'=>array('description' => $descripcionexterna)));
	}
	
	public function externalPositionEdit() {
		$parametros = $this->request->data;
		
		$posicionvieja = $parametros['posicionvieja'];
		$descripcion = $parametros['descripcion'];
		
		$tupla = $this->Position->find('first', array('conditions' => array("Position.description" => $posicionvieja)));
		
		$position_id = $tupla['Position']['id'];
		$this->Position->id = $position_id;
		$this->Position->saveField('description', $descripcion);
	}
	
	public function externalPositionDelete(){
		$parametros = $this->request->data;
		
		$descripcion = $parametros['descripcion'];
		
		$posicion = $this->Position->find('first', array('conditions' => array("Position.description" => $descripcion)));
		
		$this->Position->id = $posicion['Position']['id'];
		$this->Position->delete();
		
	}
}
