<?php
App::uses('AppController', 'Controller');
/**
 * UserTypes Controller
 *
 * @property UserType $UserType
 */
class UserTypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UserType->recursive = 0;
		$this->set('userTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->UserType->id = $id;
		if (!$this->UserType->exists()) {
			throw new NotFoundException(__('Invalid user type'));
		}
		$this->set('userType', $this->UserType->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserType->create();
			if ($this->UserType->save($this->request->data)) {
				$this->Session->setFlash(__('The user type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user type could not be saved. Please, try again.'));
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
		$this->UserType->id = $id;
		if (!$this->UserType->exists()) {
			throw new NotFoundException(__('Invalid user type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserType->save($this->request->data)) {
				$this->Session->setFlash(__('The user type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user type could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->UserType->read(null, $id);
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
		$this->UserType->id = $id;
		if (!$this->UserType->exists()) {
			throw new NotFoundException(__('Invalid user type'));
		}
		if ($this->UserType->delete()) {
			$this->Session->setFlash(__('User type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function isAuthorized($user) {
		if (isset($user['active']) && $user['active'] == true) {
		//Reponedor puede acceder a todas las acciones que tengan que ver con las etiquetas y su asignacion con productos
			if (isset($user['user_type_id']) && $user['user_type_id'] === '1') {
				return true;
			}
		}
		//Default deny
		return parent::isAuthorized($user);
	}
}
