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
class TerminalController extends AppController
{

    /**
     * 此controller使用下列model
     *
     * @var array
     */
    public $uses = array(
            'Airport',
            'Terminal'
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
        $this->set('data', $this->Terminal->find('all'));
    }

    public function add ()
    {
        $this->getListForPullDown();
    }

    public function del ($id)
    {
        if (isset($id)) {
            $this->Terminal->delete($id);
            $this->redirect('/Terminal');
        } else {
            throw new NotFoundException();
        }
    }

    public function edit ($id)
    {
        if (isset($id)) {
            $this->set('data', $this->Terminal->findById($id));
            $this->getListForPullDown();
        } else {
            throw new NotFoundException();
        }
    }

    public function save ()
    {
        if (isset($this->data['Terminal']['id'])) {
            $this->view = 'edit';
        } else {
            $this->view = 'add';
        }
        
        if (isset($_POST['_method'])) {
            if ($this->Terminal->save($this->data)) {
                $flyTo = '/Terminal';
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
        $this->set('Airport', $this->Airport->airportForList());
    }
}