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
class Country extends Model
{

    /**
     * 类名
     *
     * @var string
     */
    var $name = 'Country';

    /**
     * 所使用的数据库表名
     *
     * @var string
     */
    var $useTable = 'countries';

    /**
     * 下拉列表数据源
     *
     * 为下拉列表而取得国家数据。所有数据以id=>cname格式存在数组中并返回
     *
     * @return array 国家列表
     */
    public function countryForList ()
    {
        $cs = $this->find('all', 
                array(
                        'order' => array(
                                'Country.cname' => 'ASC'
                        )
                ));
        $cl = array();
        for ($i = 0; $i < count($cs); $i ++) {
            $cl[$cs[$i]['Country']['id']] = $cs[$i]['Country']['cname'];
        }
        
        return $cl;
    }
}
