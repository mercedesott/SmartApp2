<?php
App::uses('AppController', 'Controller');
/**
 * Emails Controller
 *
 * @property Email $Email
 */
class EmailsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Email->recursive = 0;
		$this->set('emails', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Email->id = $id;
		if (!$this->Email->exists()) {
			throw new NotFoundException(__('Invalid email'));
		}
		$this->set('email', $this->Email->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Email->create();
			if ($this->Email->save($this->request->data)) {
				$this->Session->setFlash(__('The email has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The email could not be saved. Please, try again.'));
			}
		}
		$branches = $this->Email->Branch->find('list');
		$this->set(compact('branches'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Email->id = $id;
		if (!$this->Email->exists()) {
			throw new NotFoundException(__('Invalid email'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Email->save($this->request->data)) {
				$this->Session->setFlash(__('The email has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The email could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Email->read(null, $id);
		}
		$branches = $this->Email->Branch->find('list');
		$this->set(compact('branches'));
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
		$this->Email->id = $id;
		if (!$this->Email->exists()) {
			throw new NotFoundException(__('Invalid email'));
		}
		if ($this->Email->delete()) {
			$this->Session->setFlash(__('Email deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Email was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function isAuthorized($user) {
		if (isset($user['active']) && $user['active'] == true) {
		//Reponedor puede acceder a todas las acciones que tengan que ver con las etiquetas y su asignacion con productos
			if (isset($user['user_type_id']) && $user['user_type_id'] === '3') {
				return true;
			}
		}
		//Default deny
		return parent::isAuthorized($user);
	}
}
