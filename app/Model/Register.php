<?php

/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package app.Model
 */
class Register extends Model
{

    /**
     * 类名
     *
     * @var string
     */
    var $name = 'Register';

    /**
     * 所使用的数据库表名
     *
     * @var string
     */
    var $useTable = 'registers';

    /**
     * 与Company为 此多 对 彼一 的关系
     * 与Aircraft为 此多 对 彼一 的关系
     */
    public $belongsTo = array(
            'Company' => array(
                    'className' => 'Company',
                    'foreignKey' => 'company_id'
            ),
            'Aircraft' => array(
                    'className' => 'Aircraft',
                    'foreignKey' => 'aircraft_id'
            )
    );

    /**
     * 字段验证规则
     *
     * register_no: 一至二位大写英文字母，接横线，再接一至四位大写英文字母或数字
     *
     * @var array
     */
    var $validate = array(
            'register_no' => array(
                    'alphaNumeric3' => array(
                            'rule' => '/^[A-Z]{1,2}-[A-Z0-9]{1,4}$/',
                            'message' => '注册号只能由一至二位大写英文字母，接横线，再接一至四位大写英文字母或数字组成。',
                            'required' => true,
                            'allowEmpty' => false
                    )
            )
    );

    /**
     * 下拉列表数据源
     *
     * 为下拉列表而取得航站楼数据。所有数据以id=>cname格式存在数组中并返回
     *
     * @return array 航站楼列表
     */
    public function registerForList ()
    {
        $cs = $this->find('all', [
                'order' => '`Register`.`id` DESC'
        ]);
        $cl = array();
        for ($i = 0; $i < count($cs); $i ++) {
            $cl[$cs[$i]['Register']['id']] = $cs[$i]['Register']['register_no'] .
                     ' (' . $cs[$i]['Aircraft']['model'] . ')';
        }
        
        return $cl;
    }
}