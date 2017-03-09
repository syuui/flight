<?php
App::uses('AppController', 'Controller');

/**
 * AircraftController
 *
 * 机型用Controller
 *
 * @package app.Controller
 * @link
 *
 */
class AircraftController extends AppController
{

    /**
     * 此controller使用下列model
     *
     * @var array
     */
    public $uses = array(
            'Aircraft'
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
        
        $this->set('acs', $this->Aircraft->find('all', '*', 'ename'));
        
        $this->Message->saveLog('IC0002');
    }

    public function add ()
    {
        $this->Message->saveLog('IC0001');
        
        $this->Message->saveLog('IC0002');
    }

    public function del ($id)
    {
        $this->Message->saveLog('IC0001');
        
        if (isset($id)) {
            $this->Message->saveLog('IC0203', 
                    array(
                            $id
                    ));
            $this->Aircraft->delete($id);
            $this->redirect('/Aircraft');
        }
        
        $this->Message->saveLog('IC0002');
    }

    public function edit ($id)
    {
        $this->Message->saveLog('IC0001');
        
        if (isset($id)) {
            $this->set('acs', $this->Aircraft->findById($id));
        }
        
        $this->Message->saveLog('IC0002');
    }

    public function save ()
    {
        $this->Message->saveLog('IC0001');
        if (isset($this->data['Aircraft']['id'])) {
            $this->view = 'edit';
        } else {
            $this->view = 'add';
        }
        
        if (isset($_POST['_method'])) {
            if ($this->Aircraft->save($_POST['data'])) {
                $this->Message->saveLog('IC0102', 
                        array(
                                $this->data['Aircraft']['model']
                        ));
                $flyTo = '/Aircraft';
            } else {
                $this->Message->saveLog('IC0104', 
                        array(
                                $this->data['Aircraft']['model']
                        ));
                $flyTo = '';
            }
            $acs = $this->data;
            $this->set(compact('flyTo', 'acs'));
        } else {
        /**
         * TODO: 例外处理
         */
        }
        
        $this->Message->saveLog('IC0002');
    }
}