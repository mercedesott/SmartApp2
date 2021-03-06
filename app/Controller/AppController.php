<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $components = array(
	'Session',
	'Auth' => array(
		'loginRedirect' => array('controller' => 'products', 'action' => 'index'),
		'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
		'authorize' => array('Controller')
		)
	);
	
	public function beforeFilter() {
		//si quiero dejar que gente sin loguearse pueda acceder a algo
		//$this->Auth->allow('index', 'view');
		$this->Auth->allow('login');
		$this->Auth->allow('logout');
		$this->Auth->allow('externalAdd');
		$this->Auth->allow('externalEdit');
		$this->Auth->allow('externalDelete');
		$this->Auth->allow('internalEdit');
		$this->Auth->allow('externalAisleAdd');
		$this->Auth->allow('externalAisleEdit');
		$this->Auth->allow('externalAisleDelete');
		$this->Auth->allow('externalPositionAdd');
		$this->Auth->allow('externalPositionEdit');
		$this->Auth->allow('externalPositionDelete');
		$this->Auth->allow('externalShelfAdd');
		$this->Auth->allow('externalShelfEdit');
		$this->Auth->allow('externalShelfDelete');
		$this->Auth->allow('externalBarcodeAdd');
		$this->Auth->allow('externalBarcodeEdit');
		$this->Auth->allow('externalBarcodeDelete');
		$this->set('user',$this->Auth->user());
		//$this->Auth->authorize= array('Controller');
		
		//$this->Auth->allow('add');
	}
	
	public function isAuthorized($user) {
		if (isset($user['active']) && $user['active'] == true) {
		//Admin puede acceder a todas las acciones
			if (isset($user['user_type_id']) && $user['user_type_id'] === '1') {
				return true;
			}
		}
		//Default deny
		return false;
	}
}