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
 * CompanyController
 *
 * 航空公司用Controller
 *
 * @package app.Controller
 * @link
 *
 */
class AirportController extends AppController
{

    /**
     * 此controller使用下列model
     *
     * @var array
     */
    public $uses = array(
            'Airport',
            'Country'
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
        $this->Message->saveLog('IC0001');
        
        $acs = $this->Airport->find('all');
        $this->set(compact('acs'));
        
        $this->Message->saveLog('IC0002');
    }

    public function add ()
    {
        $this->Message->saveLog('IC0001');
        $this->getListForPullDown();
        $this->Message->saveLog('IC0002');
    }

    public function del ($id)
    {
        $this->Message->saveLog('IC0001');
        
        if (isset($id)) {
            $this->Message->saveLog('IC0103', array(
                    $id
            ));
            $this->Airport->delete($id);
            $this->redirect('/Airport');
        }
        
        $this->Message->saveLog('IC0002');
    }

    public function edit ($id)
    {
        $this->Message->saveLog('IC0001');
        
        if (isset($id)) {
            $this->set('acs', $this->Airport->findById($id));
        } else {
        /**
         * TODO: 例外处理
         */
        }
        $this->getListForPullDown();
        $this->Message->saveLog('IC0002');
    }

    public function save ()
    {
        $this->Message->saveLog('IC0001');
        if (isset($_POST['data']['Airport']['id'])) {
            $this->view = 'edit';
        } else {
            $this->view = 'add';
        }
        
        if (isset($_POST['_method'])) {
            if ($this->Airport->save($_POST['data'])) {
                $this->Message->saveLog('IC0102', 
                        array(
                                $_POST['data']['Airport']['cname']
                        ));
                $flyTo = '/Airport';
            } else {
                $this->Message->saveLog('IC0104', 
                        array(
                                $_POST['data']['Airport']['cname']
                        ));
                $flyTo = '';
            }
        } else {
        /**
         * TODO: 例外处理
         */
        }
        $acs = $_POST['data'];
        $this->set(compact('flyTo', 'acs'));
        $this->getListForPullDown();
        $this->Message->saveLog('IC0002');
    }

    private function getListForPullDown ()
    {
        $this->set('Country', $this->Country->countryForList());
    }
}