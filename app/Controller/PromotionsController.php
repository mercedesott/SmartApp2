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
		//if(isset($user['user_type_id']) && ($user['user_type_id'] === '1' || $user['user_type_id'] === '2')) {
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
		//} else {
			//$this->redirect(array('action' => 'index'));
		//}
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
			$this->set('start_date', $start_date);
			$this->set('finish_date', $finish_date);
			$this->render('makeReport');
			
			//$this->layout = 'pdf'; //this will use the pdf.ctp layout
			//$this->render('view_pdf');
			
			//this layout pdf y dp en la view pdf itero con la variable promotions
			//le hago this render view_pdf
		}
	}
	
	function makeReport() {
		
	}
	
	function viewPdf() {
		if ($this->request->is('post')) {
			//var_dump($this->request->data);
			$start_date = $this->request->data['Promotion']['start_date'];
			$finish_date = $this->request->data['Promotion']['finish_date'];
			//$promotions = $this->paginate(array("Promotion.start_date >= " => $start_date, "Promotion.start_date <=" => $finish_date));
			$promotions = $this->Promotion->find('all', array('conditions' => array("Promotion.start_date >= " => $start_date, "Promotion.start_date <=" => $finish_date)));
		
			$this->set('promotions', $promotions);
			//var_dump($promotions);
		}
		$this->layout = 'pdf'; //this will use the pdf.ctp layout
		$this->render();
	}
	
	function pending() {
		$promotions = $this->paginate(array("Promotion.active = '0'"));
		$this->set('promotions', $promotions);
		$this->render();
	}
	
	public function isAuthorized($user) {
		if (isset($user['active']) && $user['active'] == true) {
		//Reponedor puede acceder a todas las acciones que tengan que ver con las etiquetas y su asignacion con productos
			if (isset($user['user_type_id']) && $user['user_type_id'] === '3' && ($this->action != 'edit') && ($this->action != 'pending')) {
				return true;
			}
			if (isset($user['user_type_id']) && $user['user_type_id'] === '2' && ($this->action != 'report') && ($this->action != 'make_report') && ($this->action != 'viewPdf')) {
				return true;
			}
		}
		//Default deny
		return parent::isAuthorized($user);
	}
}
