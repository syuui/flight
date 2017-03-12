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
 * @author 周威 <syuui@sohu.com>
 * @copyright 周威 2017
 * @version 1.0
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
        $this->set('data', $this->Aircraft->find('all', '*', 'ename'));
    }

    public function add ()
    {}

    public function del ($id)
    {
        if (isset($id)) {
            $this->Aircraft->delete($id);
            $this->redirect('/Aircraft');
        } else {
            throw new NotFoundException();
        }
    }

    public function edit ($id)
    {
        if (isset($id)) {
            $this->set('data', $this->Aircraft->findById($id));
        } else {
            throw new NotFoundException();
        }
    }

    public function save ()
    {
        if (isset($this->data['Aircraft']['id'])) {
            $this->view = 'edit';
        } else {
            $this->view = 'add';
        }
        
        if (isset($_POST['_method'])) {
            if ($this->Aircraft->save($this->data)) {
                $flyTo = '/Aircraft';
            } else {
                $flyTo = '';
            }
            $data = $this->data;
            $this->set(compact('flyTo', 'data'));
        } else {
            throw new SaveBlankDataException(null);
        }
    }
}