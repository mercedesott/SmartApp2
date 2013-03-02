<?php
App::uses('AppController', 'Controller');
/**
 * Barcodes Controller
 *
 * @property Barcode $Barcode
 */
class BarcodesController extends AppController {

/**
 * index method
 *
 * @return void
 */
 
 var $uses = array('Barcode', 'Product');
 
	public function index() {
		$this->Barcode->recursive = 0;
		$this->set('barcodes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Barcode->id = $id;
		if (!$this->Barcode->exists()) {
			throw new NotFoundException(__('Invalid barcode'));
		}
		$this->set('barcode', $this->Barcode->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Barcode->create();
			if ($this->Barcode->save($this->request->data)) {
				$this->Session->setFlash(__('The barcode has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The barcode could not be saved. Please, try again.'));
			}
		}
		$products = $this->Barcode->Product->find('list');
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
		$this->Barcode->id = $id;
		if (!$this->Barcode->exists()) {
			throw new NotFoundException(__('Invalid barcode'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Barcode->save($this->request->data)) {
				$this->Session->setFlash(__('The barcode has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The barcode could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Barcode->read(null, $id);
		}
		$products = $this->Barcode->Product->find('list');
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
		$this->Barcode->id = $id;
		if (!$this->Barcode->exists()) {
			throw new NotFoundException(__('Invalid barcode'));
		}
		if ($this->Barcode->delete()) {
			$this->Session->setFlash(__('Barcode deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Barcode was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function isAuthorized($user) {
		if (isset($user['active']) && $user['active'] == true) {
		//Reponedor puede acceder a todas las acciones que tengan que ver con las etiquetas y su asignacion con productos
			if (isset($user['user_type_id']) && $user['user_type_id'] === '2') {
				return true;
			}
		}
		//Default deny
		return parent::isAuthorized($user);
	}
	
	public function externalBarcodeAdd() {
		$parametros = $this->request->data;
		$numeroext = $parametros['numero'];
		$productoext = $parametros['producto'];
		
		$producto = $this->Product->find('first', array('conditions' => array("Product.number" => $productoext)));
		
		$producto_id = $producto['Product']['id'];
		
		$this->Barcode->create();
		$this->Barcode->save(array('Barcode'=>array('number' => $numeroext, 'product_id' => $producto_id)));
		
	}
	
	public function externalBarcodeEdit() {
		$parametros = $this->request->data;
		
		$numeroext = $parametros['numero'];
		$productoext = $parametros['producto_id'];
		$codigoviejaext = $parametros['codigovieja'];
		
		$tupla = $this->Barcode->find('first', array('conditions' => array("Barcode.number" => $codigoviejaext)));
		
		$barcode_id = $tupla['Barcode']['id'];
		$this->Barcode->id = $barcode_id;
		$this->Barcode->saveField('number', $numeroext);
	}
	
	public function externalBarcodeDelete() {
		$parametros = $this->request->data;
		
		$numeroext = $parametros['numero'];
		
		$codigo = $this->Barcode->find('first', array('conditions' => array("Barcode.number" => $numeroext)));
		
		$this->Barcode->id = $codigo['Barcode']['id'];
		$this->Barcode->delete();
		
	}
}
