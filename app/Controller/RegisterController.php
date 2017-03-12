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
App::uses('AppController', 'Controller');

/**
 * RegisterController
 *
 * 飞行器注册号Controller
 *
 * @package app.Controller
 * @link
 *
 */
class RegisterController extends AppController
{

    /**
     * 此controller使用下列model
     *
     * @var array
     */
    public $uses = array(
            'Register',
            'Aircraft',
            'Company'
    );

    /**
     * 此controller使用下列component
     *
     * @var array
     */
    public $components = array(
            'Message'
    );

    /**
     * 此controller使用下列helper
     *
     * @var array
     */
    public $helper = array(
            'Tag'
    );

    public function index ()
    {
        $this->set('data', $this->Register->find('all'));
    }

    public function add ()
    {
        $this->getListForPullDown();
    }

    public function del ($id)
    {
        if (isset($id)) {
            $this->Register->delete($id);
            $this->redirect('/Register');
        } else {
            throw new NotFoundException();
        }
    }

    public function edit ($id)
    {
        if (isset($id)) {
            $this->set('data', $this->Register->findById($id));
            $this->getListForPullDown();
        } else {
            throw new NotFoundException();
        }
        $this->Message->saveLog('IC0002');
    }

    public function save ()
    {
        if (isset($this->data['Register']['id'])) {
            $this->view = 'edit';
        } else {
            $this->view = 'add';
        }
        
        if (isset($_POST['_method'])) {
            if ($this->Register->save($this->data)) {
                $flyTo = '/Register';
            } else {
                $flyTo = '';
            }
            
            $data = $this->data;
            $this->set(compact('flyTo', 'data'));
            $this->getListForPullDown();
        } else {
            throw new SaveBlankDataException(null);
        }
    }

    private function getListForPullDown ()
    {
        $this->set('Aircraft', $this->Aircraft->aircraftForList());
        $this->set('Company', $this->Company->companyForList());
    }
}
