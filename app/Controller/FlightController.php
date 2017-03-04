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
 * FlightController
 *
 * 航班、旅行用Controller
 *
 * @package app.Controller
 * @link
 *
 */
class FlightController extends AppController
{

    /**
     * 此controller使用下列model
     *
     * @var array
     */
    public $uses = array(
            'Flight',
            'Airport',
            'Terminal',
            'Company',
            'Aircraft',
            'Register'
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
        
        $acs = $this->Flight->find('all');
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
            $this->Message->saveLog('IC0103', 
                    array(
                            $id
                    ));
            $this->Flight->delete($id);
            $this->redirect('/Flight');
        }
        
        $this->Message->saveLog('IC0002');
    }

    public function edit ($id)
    {
        if (isset($id)) {
            $this->set('acs', $this->Flight->findById($id));
            $this->getListForPullDown();
        } else {
        /**
         * TODO: 例外处理
         */
        }
    }

    public function save ()
    {
        $this->Message->saveLog('IC0001');
        
        if (isset($_POST['data']['Flight']['id'])) {
            $this->view = 'edit';
        } else {
            $this->view = 'add';
        }
        
        if (isset($_POST['_method'])) {
            if ($this->Flight->save($_POST['data'])) {
                $flyTo = '/Flight';
                $Flights = $this->Flight->flightForList();
            } else {
                $flyTo = '';
                $Flights = $this->Flight->flightForList();
            }
        } else {
        /**
         * TODO: 例外处理
         */
        }
        $acs = $_POST['data'];
        $this->set('flyTo', $flyTo);
        $this->set('acs', $_POST['data']);
        $this->getListForPullDown();
    }

    private function getListForPullDown ()
    {
        $this->set('Company', $this->Company->companyForList());
        $this->set('Terminal', $this->Terminal->terminalForListWithAirport());
        $this->set('Aircraft', $this->Aircraft->aircraftForList());
        $this->set('Register', $this->Register->registerForList());
    }
}