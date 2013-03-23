<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
		//si quiero que alguien pueda acceder sin loguearse a algo
		//$this->Auth->allow('add', 'logout');
		$this->Auth->allow('login');
		//$this->Auth->allow('add');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$userTypes = $this->User->UserType->find('list');
		$this->set(compact('userTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$userTypes = $this->User->UserType->find('list');
		$this->set(compact('userTypes'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$user=$this->Auth->user();
				if (isset($user['active']) && $user['active'] == true) {
					if($user["user_type_id"] == 1){
						$this->redirect($this->Auth->redirect());	
					} else if($user['user_type_id'] == 2){
						$this->redirect(array('controller' => 'Promotions', 'action' => 'pending'));
					} else if($user['user_type_id'] == 3){
						$this->redirect(array('controller' => 'Promotions', 'action' => 'index'));
					} else if($user['user_type_id'] == 4){
						$this->redirect(array('controller' => 'Labels', 'action' => 'index'));
					}
				} else {
					$this->redirect($this->Auth->logout());
				}
				
			} else {
				$this->Session->setFlash(__('Nombre de usuario o contrasenia invalida'));
			}
		}
	}
	
	public function logout() {
		$this->redirect($this->Auth->logout());
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

	public function actualizarBdd(){
		$r = new HttpRequest('http://localhost/SupermercadoCake3/products/mandarBdd', HttpRequest::METH_POST);
		$r->setOptions(array('cookies' => array('lang' => 'de')));
		
		try {
    		$r->send()->getBody();
		} catch (HttpException $ex) {
    	echo $ex;
		}
		
		$this->redirect(array('action' => 'index'));
	}
}
