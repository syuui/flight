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
class Terminal extends Model
{

    /**
     * 类名
     *
     * @var string
     */
    var $name = 'Terminal';

    /**
     * 所使用的数据库表名
     *
     * @var string
     */
    var $useTable = 'terminals';

    /**
     * 与其它数据库为 此多 对 彼一 的关系
     *
     * @var array
     */
    public $belongsTo = array(
            'Airport' => array(
                    'className' => 'Airport',
                    'foreignKey' => 'airport_id'
            )
    );

    /**
     * 虚字段
     *
     * @var String 使用虚字段 flight_name 表示唯一的航班，如 2017-02-18 09:25:00 CA925
     *      使用虚字段 departure_date 表示航班的日期
     */
    public $virtualFields = array(
           // 'D_tname' => 'CONCAT(D_Airport.cname, D_Terminal.cname)',
           // 'A_tname' => 'CONCAT(A_Airport.cname, A_Terminal.cname)'
    );

    /**
     * 字段验证规则
     *
     * icao_code: 大写英文字母或者数字，三位
     * iata_code: 大写英文字母或者数字，两位
     * ccode: 大写英文字母或者数字，两位
     * cname: 最长32字节
     * ename: 最长128字节
     *
     * @var array
     */
    var $validate = array(
            'airport_id' => array(
                    'rule' => 'naturalNumber',
                    'required' => true,
                    'allowEmpty' => false,
                    'message' => '机场不能为空。'
            ),
            'abbreviation' => array(
                    'alphaNumeric3' => array(
                            'rule' => '/^[A-Z0-9]{0,4}$/',
                            'message' => '航站楼缩写只能由大写英文字母和数字组成，且长度最大为四位。',
                            'required' => true,
                            'allowEmpty' => false
                    )
            ),
            'cname' => array(
                    'rule' => array(
                            'between',
                            0,
                            32
                    ),
                    'message' => '航站楼中文名称最大32字节。',
                    'required' => false,
                    'allowEmpty' => true
            ),
            'ename' => array(
                    'rule' => array(
                            'between',
                            0,
                            128
                    ),
                    'message' => '航站楼英文名称最大128字节。',
                    'required' => false,
                    'allowEmpty' => true
            )
    );

    /**
     * 下拉列表数据源
     *
     * 为下拉列表而取得航站楼数据。所有数据以id=>cname格式存在数组中并返回
     *
     * @return array 航站楼列表
     */
    public function terminalForList ()
    {
        $cs = $this->find('all');
        $cl = array();
        for ($i = 0; $i < count($cs); $i ++) {
            $cl[$cs[$i]['Terminal']['id']] = $cs[$i]['Terminal']['cname'];
        }
        
        return $cl;
    }

    public function terminalForListWithAirport ()
    {
        $cs = $this->find('all');
        $cl = array();
        for ($i = 0; $i < count($cs); $i ++) {
            $cl[$cs[$i]['Terminal']['id']] = $cs[$i]['Airport']['cname'] .
                     $cs[$i]['Terminal']['cname'];
        }
        
        return $cl;
    }
}