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
class Aircraft extends Model {
	var $name = 'Aircraft';

	/**
	 * 所使用的数据库表名
	 *
	 * @var string
	 */
	var $useTable = 'aircrafts';

	/**
	 * 字段验证规则
	 *
	 * model: 最大64字节
	 * manufacturer: 最大128字节
	 * length: 数字，大于0且小于100
	 * wingspan: 数字，大于0且小于100
	 * height: 数字，大于0且小于100
	 * max_range： 数字，大于0且小于20000
	 * curising_speed： 数字，大于0且小于10000
	 * max_altitude： 数字，大于0且小于40000
	 * engines： 数字
	 *
	 * @var array
	 */
	var $validate = array (
		'model' => array (
			'length' => array (
				'rule' => array (
					'between',
					0,
					64
				),
				'required' => true,
				'allowEmpty' => false,
				'message' => '机型最长64字节。'
			),
			'unique' => array (
				'rule' => 'isUnique',
				'message' => '此机型已经存在。'
			)
		),
		'manufacturer' => array (
			'length' => array (
				'rule' => array (
					'between',
					0,
					128
				),
				'message' => '制造商最长128字节。',
				'required' => false,
				'allowEmpty' => true,


			)
		),
		'length' => array (
			'numeric' => array (
				'rule' => 'numeric',
				'message' => '长度不是一个合法的数字。',
				'required' => false,
				'allowEmpty' => true
			),
			'lt100' => array (
				'rule' => array (
					'comparison',
					'<',
					100
				),
				'message' => '长度必须小于100米。'
			),
			'gt0' => array (
				'rule' => array (
					'comparison',
					'>',
					0
				),
				'message' => '长度必须大于0米'
			)
		),
		'wingspan' => array (
			'numeric' => array (
				'rule' => 'numeric',
				'message' => '翼展不是一个合法的数字。',
				'required' => false,
				'allowEmpty' => true
			),
			'lt100' => array (
				'rule' => array (
					'comparison',
					'<',
					100
				),
				'message' => '翼展必须小于100米。'
			),
			'gt0' => array (
				'rule' => array (
					'comparison',
					'>',
					0
				),
				'message' => '翼展必须大于0米'
			)
		),
		'height' => array (
			'numeric' => array (
				'rule' => 'numeric',
				'message' => '高度不是一个合法的数字。',
				'required' => false,
				'allowEmpty' => true
			),
			'lt100' => array (
				'rule' => array (
					'comparison',
					'<',
					100
				),
				'message' => '高度必须小于100米。'
			),
			'gt0' => array (
				'rule' => array (
					'comparison',
					'>',
					0
				),
				'message' => '高度必须大于0米'
			)
		),
		'max_range' => array (
			'numeric' => array (
				'rule' => 'numeric',
				'message' => '最大航程不是一个合法的数字。',
				'required' => false,
				'allowEmpty' => true
			),
			'lt20000' => array (
				'rule' => array (
					'comparison',
					'<',
					20000
				),
				'message' => '最大航程必须小于20000公里。'
			),
			'gt0' => array (
				'rule' => array (
					'comparison',
					'>',
					0
				),
				'message' => '最大航程必须大于0公里'
			)
		),
		'curising_speed' => array (
			'numeric' => array (
				'rule' => 'numeric',
				'message' => '巡航速度不是一个合法的数字。',
				'required' => false,
				'allowEmpty' => true
			),
			'lt10000' => array (
				'rule' => array (
					'comparison',
					'<',
					10000
				),
				'message' => '巡航速度必须小于10000公里/小时。'
			),
			'gt0' => array (
				'rule' => array (
					'comparison',
					'>',
					0
				),
				'message' => '巡航速度必须大于0公里/小时'
			)
		),
		'max_altitude' => array (
			'numeric' => array(
				'rule' => 'numeric',
				'message' => '最大巡航高度不是一个合法的数字。',
				'required' => false,
				'allowEmpty' => true
			),
			'lt40000' => array (
				'rule' => array (
					'comparison',
					'<',
					40000
				),
				'message' => '最大巡航高度必须小于40000米。。'
			),
			'gt0' => array (
				'rule' => array (
					'comparison',
					'>',
					0
				),
				'message' => '最大巡航高度必须大于0米'
			)
		),
		'engines' => array (
			'rule' => 'numeric',
			'message' => '引擎数目不是一个合法的数字。',
			'required' => false,
			'allowEmpty' => true
		)
	);

	/**
	 * 下拉列表数据源
	 *
	 * 为下拉列表而取得航空公司数据。所有数据以id=>cname格式存在数组中并返回
	 *
	 * @return array 航空公司列表
	 */
	public function aircraftForList() {
		$cs = $this->find('all', array('fields'=>array('Aircraft.id', 'Aircraft.model')));
		$cl = array ();
		for ($i = 0; $i < count($cs); $i++) {
			$cl["{$cs[$i]['Aircraft']['id']}"] = $cs[$i]['Aircraft']['model'];
		}
		return $cl;
	}
}