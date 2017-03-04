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
class Company extends Model
{

    /**
     * 类名
     *
     * @var string
     */
    var $name = 'Company';

    /**
     * 所使用的数据库表名
     *
     * @var string
     */
    var $useTable = 'companies';

    /**
     * 与countries表为此多对彼一的关系
     */
    var $belongsTo = array(
            'Country' => array(
                    'className' => 'Country',
                    'foreignKey' => 'ccode'
            )
    );

    /**
     * 字段验证规则
     *
     * icao_code: 大写英文字母或者数字，三位
     * iata_code: 大写英文字母或者数字，两位
     * ccode: 数字，最大三位
     * cname: 最长32字节
     * ename: 最长128字节
     *
     * @var array
     */
    var $validate = array(
            'icao_code' => array(
                    'alphaNumeric3' => array(
                            'rule' => '/^[A-Z0-9]{3}$/',
                            'message' => 'ICAO_CODE只能由大写英文字母和数字组成，且长度必须为三位。',
                            'required' => true,
                            'allowEmpty' => false
                    ),
                    'unique' => array(
                            'rule' => 'isUnique',
                            'message' => '此ICAO_CODE已经存在。'
                    )
            ),
            'iata_code' => array(
                    'rule' => '/^[A-Z0-9]{2}$/',
                    'message' => 'IATA_CODE只能由大写英文字母和数字组成，且长度必须为两位。',
                    'required' => true,
                    'allowEmpty' => false
            ),
            'ccode' => array(
                    'rule' => '/^[0-9]{1,3}$/',
                    'message' => '错误的国家信息',
                    'required' => true,
                    'allowEmpty' => false
            ),
            'cname' => array(
                    'rule' => array(
                            'between',
                            0,
                            32
                    ),
                    'message' => '中文商号最大32字节。',
                    'required' => false,
                    'allowEmpty' => true
            ),
            'ename' => array(
                    'rule' => array(
                            'between',
                            0,
                            128
                    ),
                    'message' => '英文商号最大128字节。',
                    'required' => false,
                    'allowEmpty' => true
            )
    )
    ;

    /**
     * 下拉列表数据源
     *
     * 为下拉列表而取得航空公司数据。所有数据以id=>cname格式存在数组中并返回
     *
     * @return array 航空公司列表
     */
    public function companyForList ()
    {
        $cs = $this->find('all');
        
        $cl = array();
        for ($i = 0; $i < count($cs); $i ++) {
            $cl[$cs[$i]['Company']['id']] = $cs[$i]['Company']['cname'];
        }
        return $cl;
    }
}