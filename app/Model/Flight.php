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

App :: uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class Flight extends Model {
	/**
	 * 类名
	 *
	 * @var string
	 */
	var $name = 'Flight';

	/**
	 * 所使用的数据库表名
	 *
	 * @var string
	 */
	var $useTable = 'flights';

	/**
	 * 与company表为此多对彼一的关系
	 */
    public $belongsTo = array(
        'Company' => array(
            'className' => 'Company',
            'foreignKey' => 'company_id'
        ),
        'D_Terminal' => array(
        	'className' => 'Terminal',
        	'foreignKey' => 'departure_terminal_id'
        ),
        'A_Terminal' => array(
        	'className' => 'Terminal',
        	'foreignKey' => 'arrival_terminal_id'
        ),
        'Register' => array(
        	'className' => 'Register',
        	'foreignKey' => 'register_id'
        )
    );

	/**
	 * 虚字段
	 *
	 * @var String
	 *
	 * 使用虚字段 flight_name 表示唯一的航班，如 2017-02-18 09:25:00 CA925
	 * 使用虚字段 departure_date 表示航班的日期
	 */
	public $virtualFields = array(
	    'flight_name' => 'CONCAT(Company.iata_code, Flight.flight_number)',
	    'departure_date' => 'DATE_FORMAT(departure_time, "%Y-%m-%d")'
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
	var $validate = array (
		'company_id' => array (
			'alphaNumeric3' => array (
				'rule' => '/^[1-9]?$/',
				'message' => 'company_id只能由数字组成，且长度必须大于一位。',
				'required' => true,
				'allowEmpty' => false
			)
		),
		'flight_number' => array (
			'rule' => '/^[0-9]{1,4}$/',
			'message' => 'flight_number只能由数字组成，且长度小于四位。',
			'required' => true,
			'allowEmpty' => false
		),
		'departure_terminal_id' => array (
			'alphaNumeric3' => array (
				'rule' => '/^[1-9]?/',
				'message' => 'departure_terminal_id只能由数字组成，且长度必须大于一位。',
				'required' => true,
				'allowEmpty' => false
			)
		),
		'departure_terminal_gate' => array (
			'rule' => '/^[A-Z0-9]{1,3}$/',
			'message' => 'departure_terminal_gate只能由英文字母或数字组成，且长度小于三位。',
			'required' => true,
			'allowEmpty' => false
		),
		'arrival_terminal_id' => array (
			'alphaNumeric3' => array (
				'rule' => '/^[1-9]?/',
				'message' => 'arrival_terminal_id只能由数字组成，且长度必须大于一位。',
				'required' => true,
				'allowEmpty' => false
			)
		),
		'register_id' => array (
			'alphaNumeric3' => array (
				'rule' => '/^[1-9]?/',
				'message' => 'register_id只能由数字组成，且长度必须大于一位。',
				'required' => true,
				'allowEmpty' => false
			)
		),

		'seat_no' => array (
			'alphaNumeric3' => array (
				'rule' => '/^[1-9]{1,2}[A-Z]$/',
				'message' => 'seat_no只能由一到两位数字和一位英文字母组成',
				'required' => true,
				'allowEmpty' => false
			)
		)
	);

	/**
	 * 下拉列表数据源
	 *
	 * 为下拉列表而取得航班数据。所有数据以id=>cname格式存在数组中并返回
	 *
	 * @return array 机场列表
	 */
	public function flightForList() {
		$cs = $this->find('all');
		$cl = array ();
		for ($i = 0; $i < count($cs); $i++) {
			$cl[$cs[$i]['Flight']['id']] = $cs[$i]['Flight']['flight_name'];
		}

		return $cl;
	}
}