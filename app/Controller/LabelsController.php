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
 
 var $uses = array('Label', 'Product', 'Brand', 'Measure', 'Image', 'Barcode');
 
	public function index() {
		$this->Label->recursive = 0;
		$this->set('labels', $this->paginate());
	}
	
	
	public function search(){
		
		$products = $this->paginate(array("Product.name LIKE "=> "%".$this->request->data['Product']['search']."%"));
               $this->set('products', $products);
               $this->render('index');
	}
	
		public function autocompletar(){
		//para ver que tiene la variable adentro
		//var_dump($this->request);	
		
		//tuve que poner request porque le tengo que pedir y poner query porque ahi estaba mandando el term que es lo que viene despues
		//del ? en la url y ahi dice ?term=algo ahi puedo sacar el algo
		$products = $this->paginate(array("Product.name LIKE "=> "%".$this->request->query['term']."%"));
		//con el autoRender (que esta siempre en true) lo pongo en falso y no me busca la vista equivalente a esta accion
		//lo pongo asi porque no quiero que abra una vista, porque no existe, quiero que se quede en la misma pagina
		//var_dump($products);
		$this->autoRender=false;
		//con esto genero el json
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
				
				$etiqueta = $this->request->data;
				$posicion_id = $etiqueta['Label']['position_id'];
				$estante_id = $etiqueta['Label']['shelf_id'];
				$producto_id = $etiqueta['Label']['product_id'];
				$gondola_id = $etiqueta['Label']['aisle_id'];
				$direccion = $etiqueta['Label']['address'];
				$numero1 = $etiqueta['Label']['number'];
				$alive = $etiqueta['Label']['alive'];
				
				//var_dump($posicion_id.$estante_id.$producto_id.$gondola_id.$direccion.$numero.$alive);
				
				$producto = $this->Product->find('first', array('conditions' => array("Product.id" => $producto_id)));
				$medida_id = $producto['Product']['measure_id'];
				$marca_id = $producto['Product']['brand_id'];
				$imagen_id = $producto['Product']['image_id'];
				$nombre = $producto['Product']['name'];
				$numero = $producto['Product']['number'];
				$cantidad = $producto['Product']['quantity'];
				$descripcion = $producto['Product']['description'];
				$destacado = $producto['Product']['featured'];
				$precio = $producto['Product']['price'];
				
				//var_dump($medida_id.$marca_id.$imagen_id.$nombre.$numero.$cantidad.$descripcion.$destacado.$precio);
				
				$medidas = $this->Measure->find('first', array('conditions' => array("Measure.id" => $medida_id)));
				$medida = $medidas['Measure']['type'];
				$marcas = $this->Brand->find('first', array('conditions' => array("Brand.id" => $marca_id)));
				$marca = $marcas['Brand']['name'];
				$imagenes = $this->Image->find('first', array('conditions' => array("Image.id" => $imagen_id)));
				$imagen = $imagenes['Image']['link'];
				$codigos = $this->Barcode->find('first', array('conditions' => array("Barcode.product_id" => $producto_id)));
				$codigo = $codigos['Barcode']['number'];
				
				//var_dump($medida.$marca.$imagen.$codigo);
				
				$sep1 = explode(".", $precio);
				if($sep1[0] == $precio){
	 				$centavos = "00";
				}else{ 
	 				$centavos = $sep1[1];
				}
				$cantidad = $cantidad.$medida;
				
				$paramandar = '@'.$direccion.';0;'.$descripcion.';'.$cantidad.';'.$precio.';'.$centavos.';'.$numero.';'.$codigo.'; #';
				
				//var_dump($paramandar);
				
				`mode com6: BAUD=9600 PARITY=N data=8 stop=1 xon=off`;
    			//var_dump($paramandar);
    			$fp = fopen ("COM6:", "w+");
				//var_dump($paramandar);	
    			if (!$fp) {
        			echo "Uh-oh. Port 1 not opened.";
    			} else {                
        			//$string  = "Send"; 
        			//var_dump($paramandar);      
        			//fputs ($fp, $paramandar); 
					//var_dump($paramandar);
					sleep(2);
					$respuesta = fgets($fp);
					
					while($respuesta == NULL) {
						fputs ($fp, $paramandar);
						sleep(2);
						$respuesta = fgets($fp);
					}
					//echo "Mand�:".$paramandar."<br>";
					//$this->redirect(array('action' => 'esperar', 'param1' => $fp, 'param2' => $paramandar));
					fclose($fp);
				}
				
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
}
