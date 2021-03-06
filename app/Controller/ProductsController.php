<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 */
class ProductsController extends AppController {

/**
 * index method
 *
 * @return void
 */
 
 var $uses = array('Product', 'Brand', 'Measure', 'Image', 'Label', 'Barcode');
 
	public function index() {
		$this->Product->recursive = 0;
		$this->set('products', $this->paginate());
	}

	public function search(){
		
		$products = $this->paginate(array("Product.name LIKE "=> "%".$this->request->data['Product']['search']."%"));
               $this->set('products', $products);
               $this->render('index');
		//$condiciones= array("Product.name LIKE" => "%".$this->request->data['Product']['search']."%");			
		//$products = $this->Product->find($condiciones);
		
		//$productos = $this->Product->find('all', array("name LIKE"=>"%".$this->request->data['Product']['search']."%"));
		
		//$productos = $this->Product->paginate('Product', array('Product.name LIKE'=>'%'.$this->request->data['Product']['search'].'%'));
		//$productos= $this->Product->search($this->data['Product']['search']);
		
		//$this->set('products', $productos);
		//$this->render('/products/index');
		//$this->render('index');
	}

	public function autocompletar(){
		//para ver que tiene la variable adentro
		//var_dump($this->request);	
		
		//tuve que poner request porque le tengo que pedir y poner query porque ahi estaba mandando el term que es lo que viene despues
		//del ? en la url y ahi dice ?term=algo ahi puedo sacar el algo
		$products = $this->paginate(array("Product.name LIKE "=> "%".$this->request->query['term']."%"));
		//con el autoRender (que esta siempre en true) lo pongo en falso y no me busca la vista equivalente a esta accion
		//lo pongo asi porque no quiero que abra una vista, porque no existe, quiero que se quede en la misma pagina
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
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->set('product', $this->Product->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		}
		$measures = $this->Product->Measure->find('list');
		$brands = $this->Product->Brand->find('list');
		$images = $this->Product->Image->find('list');
		$this->set(compact('measures', 'brands', 'images'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Product->save($this->request->data)) {
				
				$producto = $this->request->data;
				$medida_id = $producto['Product']['measure_id'];
				$marca_id = $producto['Product']['brand_id'];
				$imagen_id = $producto['Product']['image_id'];
				$nombre = $producto['Product']['name'];
				$numero = $producto['Product']['number'];
				$cantidad = $producto['Product']['quantity'];
				$descripcion = $producto['Product']['description'];
				$destacado = $producto['Product']['featured'];
				$precio = $producto['Product']['price'];
				
				$medidas = $this->Measure->find('first', array('conditions' => array("Measure.id" => $medida_id)));
				$medida = $medidas['Measure']['type'];
				$marcas = $this->Brand->find('first', array('conditions' => array("Brand.id" => $marca_id)));
				$marca = $marcas['Brand']['name'];
				$imagenes = $this->Image->find('first', array('conditions' => array("Image.id" => $imagen_id)));
				$imagen = $imagenes['Image']['link'];
				
				$r = new HttpRequest('http://localhost/SupermercadoCake3/products/internalEdit', HttpRequest::METH_POST);
				$r->setOptions(array('cookies' => array('lang' => 'de')));
				$r->addPostFields(array('measure' => $medida, 'brand' => $marca, 'image' => $imagen, 'name' => $nombre, 'number' => $numero, 'quantity' => $cantidad, 'description' => $descripcion, 'featured' => $destacado, 'price' => $precio));
				
				try {
    				$r->send()->getBody();
				} catch (HttpException $ex) {
    			echo $ex;
				}
				
				$this->Session->setFlash(__('The product has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Product->read(null, $id);
		}
		$measures = $this->Product->Measure->find('list');
		$brands = $this->Product->Brand->find('list');
		$images = $this->Product->Image->find('list');
		$this->set(compact('measures', 'brands', 'images'));
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
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('Product deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Product was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function isAuthorized($user) {
		if (isset($user['active']) && $user['active'] == true) {
		//Reponedor puede acceder a todas las acciones que tengan que ver con las etiquetas y su asignacion con productos
			if (isset($user['user_type_id']) && $user['user_type_id'] === '3' && ($this->action != 'add') && ($this->action != 'edit') && ($this->action != 'delete')) {
				return true;
			}
			if (isset($user['user_type_id']) && $user['user_type_id'] === '2') {
				return true;
			}
		}
		//Default deny
		return parent::isAuthorized($user);
	}
	
	public function externalAdd() {
		$parametros = $this->request->data;
		$medext = $parametros['measure'];
		$marext = $parametros['brand'];
		$imaext = $parametros['image'];
		$nomext = $parametros['name'];
		$numext = $parametros['number'];
		$canext = $parametros['quantity'];
		$desext = $parametros['description'];
		$feaext = $parametros['featured'];
		$preext = $parametros['price'];
		
		$measure = $this->Measure->find('first', array('conditions' => array("Measure.type" => $medext)));
		$brand = $this->Brand->find('first', array('conditions' => array("Brand.name" => $marext)));
		$image = $this->Image->find('first', array('conditions' => array("Image.link" => $imaext)));		
		if($measure == NULL) {
			$measure = new Measure();
			$measure->type=$medext;
			$this->Measure->save($measure);
			$measure_id = $this->Measure->id;
		}else{
			
			$measure_id = $measure['Measure']['id'];
		}
		if($brand == NULL) {
			$brand = new Brand();
			$brand->name=$marext;
			$this->Brand->save($brand);
			$brand_id = $this->Brand->id;
		}else{
			$brand_id = $brand['Brand']['id'];
		}
		if($image == NULL) {
			$image = new Image();
			$image->link=$imaext;
			$this->Image->save($image);
			$image_id = $this->Image->id;
		}else{
			$image_id = $image['Image']['id'];
		}
		
		
		$product = new Product();
		$product->measure_id = $measure_id;
		$product->brand_id = $brand_id;
		$product->image_id = $image_id;
		$product->name = $nomext;
		$product->number = $numext;
		$product->quantity = $canext;
		$product->description =  $desext;
		$product->featured = $feaext;
		$product->price = $preext;
		
		$this->Product->save($product);
	}

	public function externalEdit() {
		$parametros = $this->request->data;
		
		$medext = $parametros['measure'];
		$marext = $parametros['brand'];
		$imaext = $parametros['image'];
		$nomext = $parametros['name'];
		$numext = $parametros['number'];
		$canext = $parametros['quantity'];
		$desext = $parametros['description'];
		$feaext = $parametros['featured'];
		$preext = $parametros['price'];
		
		//var_dump($medext.$marext.$imaext);
		
		$measure = $this->Measure->find('first', array('conditions' => array("Measure.type" => $medext)));
		$brand = $this->Brand->find('first', array('conditions' => array("Brand.name" => $marext)));
		$image = $this->Image->find('first', array('conditions' => array("Image.link" => $imaext)));
		
		//var_dump($measure.$brand.$image.$nomext.$numext.$canext.$desext.$feaext.$preext);		

		if($measure == NULL) {
			$measure = new Measure();
			$measure->type=$medext;
			$this->Measure->save($measure);
			$measure_id = $this->Measure->id;
		}else{
			
			$measure_id = $measure['Measure']['id'];
		}
		if($brand == NULL) {
			$brand = new Brand();
			$brand->name=$marext;
			$this->Brand->save($brand);
			$brand_id = $this->Brand->id;
		}else{
			$brand_id = $brand['Brand']['id'];
		}
		if($image == NULL) {
			$image = new Image();
			$image->link=$imaext;
			$this->Image->save($image);
			$image_id = $this->Image->id;
		}else{
			$image_id = $image['Image']['id'];
		}
		
		$product = $this->Product->find('first', array('conditions' => array("Product.measure_id" => $measure_id, "Product.brand_id" => $brand_id, "Product.name" => $nomext, "Product.quantity" => $canext)));
		
		//$product->measure_id = $measure_id;
		//$product->brand_id = $brand_id;
		$producto_id = $product['Product']['id'];
		//$this->Product->id = $product['Product']['id'];
		$this->Product->id = $producto_id;
		$this->Product->saveField('image_id', $image_id);
		// $product->image_id = $image_id;		$this->Product->saveField('number',$numext);
		$this->Product->saveField('description',$desext);
		$this->Product->saveField('featured',$feaext);
		$this->Product->saveField('price',$preext);
		
		$sep1 = explode(".", $preext);
		if($sep1[0] == $preext){
	 		$centavos = "00";
		}else{ 
	 		$centavos = $sep1[1];
		}
		$canext = $canext.$medext;
		
		$codigos = $this->Barcode->find('first', array('conditions' => array("Barcode.product_id" => $producto_id)));
		$codigo = $codigos['Barcode']['number'];
		
		$etiqueta = $this->Label->find('all', array('conditions' => array("Label.product_id" => $producto_id)));
		
		$tuplas = $this->Label->find('count', array('conditions' => array("Label.product_id" => $producto_id)));
		
		//var_dump($cantidad);
		
		while($tuplas != 0) {
			$tuplas = $tuplas - 1;
			$direccion = $etiqueta[$tuplas]['Label']['address'];
			
			$paramandar = '@'.$direccion.';0;'.$desext.';'.$canext.';'.$preext.';'.$centavos.';'.$numext.';'.$codigo.'; #';
			
			`mode com6: BAUD=9600 PARITY=N data=8 stop=1 xon=off`;
			$fp = fopen ("COM6:", "w+");
    		if (!$fp) {
        		echo "Uh-oh. Port 1 not opened.";
    		} else {                
        		fputs ($fp, $paramandar); 
				sleep(2);
				$respuesta = fgets($fp);

				while($respuesta == NULL) {
					fputs ($fp, $paramandar);
					sleep(2);
					$respuesta = fgets($fp);
				}
			fclose($fp);
			}
		}
	}

	public function externalDelete() {
		$parametros = $this->request->data;
		
		$medext = $parametros['measure'];
		$marext = $parametros['brand'];
		$imaext = $parametros['image'];
		$nomext = $parametros['name'];
		$numext = $parametros['number'];
		$canext = $parametros['quantity'];
		$desext = $parametros['description'];
		$feaext = $parametros['featured'];
		$preext = $parametros['price'];
		
		//var_dump($medext.$marext.$imaext);
		
		$measure = $this->Measure->find('first', array('conditions' => array("Measure.type" => $medext)));
		$brand = $this->Brand->find('first', array('conditions' => array("Brand.name" => $marext)));
		$image = $this->Image->find('first', array('conditions' => array("Image.link" => $imaext)));
		
		//var_dump($measure.$brand.$image.$nomext.$numext.$canext.$desext.$feaext.$preext);		
		$measure_id = $measure['Measure']['id'];
		$brand_id = $brand['Brand']['id'];
		$image_id = $image['Image']['id'];
				
		$product = $this->Product->find('first', array('conditions' => array("Product.measure_id" => $measure_id, "Product.brand_id" => $brand_id, "Product.name" => $nomext, "Product.quantity" => $canext)));
		
		$this->Product->id = $product['Product']['id'];
		$this->Product->delete();
		
	}

}
