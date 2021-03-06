<?php
/**
 * view for CompanyController::index
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */
echo $this->Form->button('新增', 
        array(
                'class' => 'u-btn',
                'type' => 'button',
                'onclick' => 'location.href=\'/Flight/add\''
        ));
echo "<table class=\"m-table\">";

echo $this->Html->tableHeaders(
        array(
                '航班',
                '出发地',
                '出发日时',
                '到着地',
                '到着日时',
                '注册号',
                '座位号',
                //'餐食',
                '备注',
                '&nbsp;'
        ));

foreach ($data as $ln) {
    echo $this->Html->tableCells(
            array(
                    $ln['Flight']['flight_name'],
                    $ln[0]['dcname'],
                    $ln['Flight']['departure_time'],
                    $ln[0]['acname'],
                    $ln['Flight']['arrival_time'],
                    $ln['Register']['register_no'],
                    $ln['Flight']['seat_no'],
                  //  $ln['Flight']['meal'],
                    $ln['Flight']['memo'],
                    $this->Form->button('编辑', 
                            array(
                                    'class' => 'u-btn',
                                    'type' => 'button',
                                    'onclick' => "location.href='/Flight/edit/" .
                                             $ln['Flight']['id'] . "'"
                            )) . $this->Form->button('删除', 
                            array(
                                    'class' => 'u-btn',
                                    'type' => 'button',
                                    'onclick' => "if(confirm('真的删除此航班吗？'))location.href='/Flight/del/" .
                                     $ln['Flight']['id'] . "'"
                            ))
            ));
}

echo "</table>";

echo $this->Form->button('新增', 
        array(
                'class' => 'u-btn',
                'type' => 'button',
                'onclick' => 'location.href=\'/Flight/add\''
        ));