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
class CompanyController extends AppController
{

    /**
     * 此controller使用下列model
     *
     * @var array
     */
    public $uses = array(
            'Company',
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
        $this->set('data', $this->Company->find('all', '*', 'ename'));
    }

    public function add ()
    {
        $this->getListForPullDown();
    }

    public function del ($id)
    {
        if (isset($id)) {
            $this->Company->delete($id);
            $this->redirect('/Company');
        } else {
            throw new NotFoundException();
        }
    }

    public function edit ($id)
    {
        if (isset($id)) {
            $this->set('data', $this->Company->findById($id));
            $this->getListForPullDown();
        } else {
            throw new NotFoundException();
        }
    }

    public function save ()
    {
        if (isset($this->data['Company']['id'])) {
            $this->view = 'edit';
        } else {
            $this->view = 'add';
        }
        
        if (isset($_POST['_method'])) {
            if ($this->Company->save($this->data)) {
                $flyTo = '/Company';
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
        $this->set('Country', $this->Country->countryForList());
    }
}