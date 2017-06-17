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
        $options['joins'] = array(
                array(
                        'table' => 'airports',
                        'alias' => 'D_Airport',
                        'type' => 'LEFT',
                        'conditions' => array(
                                'D_Airport.id = D_Terminal.airport_id'
                        )
                ),
                array(
                        'table' => 'airports',
                        'alias' => 'A_Airport',
                        'type' => 'LEFT',
                        'conditions' => array(
                                'A_Airport.id = A_Terminal.airport_id'
                        )
                )
        );
        $options['fields'] = array(
                'Flight.*',
                'Register.register_no',
                'D_Terminal.*',
                'A_Terminal.*',
                'CONCAT(D_Airport.cname,D_Terminal.cname) AS dcname',
                'CONCAT(A_Airport.cname,A_Terminal.cname) AS acname'
        );
        
        $d = $this->Flight->find('all', $options);
        
        $this->set('data', $d);
    }

    public function add ()
    {
        $this->getListForPullDown();
    }

    public function del ($id)
    {
        if (isset($id)) {
            $this->Flight->delete($id);
            $this->redirect('/Flight');
        } else {
            throw new NotFoundException();
        }
    }

    public function edit ($id)
    {
        if (isset($id)) {
            $this->set('data', $this->Flight->findById($id));
            $this->getListForPullDown();
        } else {
            throw new NotFoundException();
        }
    }

    public function save ()
    {
        if (isset($this->data['Flight']['id'])) {
            $this->view = 'edit';
        } else {
            $this->view = 'add';
        }
        
        if (isset($_POST['_method'])) {
            if ($this->Flight->save($this->data)) {
                $flyTo = '/Flight';
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

    public function search ()
    {
        if (! empty($this->data)) {
            $k = $this->data['Flight']['keyword'];
            $options['joins'] = array(
                    array(
                            'table' => 'airports',
                            'alias' => 'D_Airport',
                            'type' => 'LEFT',
                            'conditions' => array(
                                    'D_Airport.id = D_Terminal.airport_id'
                            )
                    ),
                    array(
                            'table' => 'airports',
                            'alias' => 'A_Airport',
                            'type' => 'LEFT',
                            'conditions' => array(
                                    'A_Airport.id = A_Terminal.airport_id'
                            )
                    )
            );
            $options['fields'] = array(
                    'Flight.*',
                    'Register.register_no',
                    'D_Terminal.*',
                    'A_Terminal.*',
                    'CONCAT(D_Airport.cname,D_Terminal.cname) AS dcname',
                    'CONCAT(A_Airport.cname,A_Terminal.cname) AS acname'
            );
            $options['conditions'] = [
                    'OR' => [
                            'Flight.flight_number LIKE' => "%$k%",
                            'D_Terminal.cname LIKE' => "%$k%",
                            'A_Terminal.cname LIKE' => "%$k%",
                            'D_Airport.cname LIKE' => "%$k%",
                            'A_Airport.cname LIKE' => "%$k%"
                    ]
            ];
            $d = $this->Flight->find('all', $options);
            $this->set('data', $d);
            $this->render('index');
        }
    }

    private function getListForPullDown ()
    {
        $this->set('Company', $this->Company->companyForList());
        $this->set('Terminal', $this->Terminal->terminalForListWithAirport());
        $this->set('Aircraft', $this->Aircraft->aircraftForList());
        $this->set('Register', $this->Register->registerForList());
    }
}