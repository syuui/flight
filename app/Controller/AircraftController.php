<?php


/**
 * Static content controller.
 *
 * This file will render views from views/Company/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App :: uses('AppController', 'Controller');

/**
 * CompanyController
 *
 * 航空公司用Controller
 *
 * @package       app.Controller
 * @link
 */
class AircraftController extends AppController {

	/**
	 * 此controller使用下列model
	 *
	 * @var array
	 */
	public $uses = array (
		'Aircraft'
	);

	/**
	* 此controller使用下列component
	*
	* @var array
	*/
	public $components = array (
		'Message'
	);

	/**
	* 此controller使用下列helper
	*
	* @var array
	*/
	public $helper = array (
		'Tag'
	);

	public function index() {
		$this->Message->saveLog('IC0001');

		$this->set('acs', $this->Aircraft->find('all', '*', 'ename'));

		$this->Message->saveLog('IC0002');
	}

	public function add() {
		$this->Message->saveLog('IC0001');

		if (isset ($_POST['_method'], $_POST['data'])) {
			if ($this->Aircraft->save($_POST['data'])) {
				$this->Message->saveLog('IC0101', array (
					$_POST['data']['Aircraft']['model']
				));
				$flyTo = '/Aircraft';
			} else {
				$this->Message->saveLog('IC0104', array (
					$_POST['data']['Aircraft']['model']
				));
				$flyTo = '';
			}
			$this->set(compact('flyTo'));
		}
		$this->Message->saveLog('IC0002');
	}

	public function del($id) {
		$this->Message->saveLog('IC0001');

		if (isset ($id)) {
			$this->Message->saveLog('IC0203', array (
				$id
			));
			$this->Aircraft->delete($id);
			$this->redirect('/Aircraft');
		}

		$this->Message->saveLog('IC0002');
	}
	public function edit($id) {
		$this->Message->saveLog('IC0001');
		$this->view = ('edit');

		if (isset ($id)) {
			$this->set('acs', $this->Aircraft->findById($id));
		}

		$this->Message->saveLog('IC0002');
	}

	public function save() {
		$this->Message->saveLog('IC0001');
		$this->view = ('edit');

		if (isset ($_POST['_method'], $_POST['data']['Aircraft']['id'])) {
			if ($this->Aircraft->save($_POST['data'])) {
				$this->Message->saveLog('IC0102', array (
					$_POST['data']['Aircraft']['model']
				));
				$flyTo = '/Aircraft';
			} else {
				$this->Message->saveLog('IC0104', array (
					$_POST['data']['Aircraft']['model']
				));
				$flyTo = '';
			}
			$acs = $_POST['data'];
			$this->set(compact('flyTo', 'acs'));
		} else {
			/**
			 * TODO: 例外处理
			 */
		}

		$this->Message->saveLog('IC0002');
	}
}