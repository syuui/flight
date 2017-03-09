<?php

/**
 * view for CompanyController::edit, CompanyController::save
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Company
 * @since         CakePHP(tm) v 0.10.0.1076
 */
echo $this->Form->create("", 
        array(
                "type" => "POST",
                "onsubmit" => "",
                "url" => array(
                        'controller' => 'Flight',
                        'action' => 'save'
                )
        ));

echo $this->Form->inputs(
        array(
                'Flight.id' => array(
                        'type' => 'hidden',
                        'value' => $acs['Flight']['id']
                ),
                'Flight.company_id' => array(
                        'label' => '航空公司',
                        'class' => 'u-pld',
                        'options' => $Company,
                        'value' => $acs['Flight']['company_id']
                ),
                'Flight.flight_number' => array(
                        'label' => '航班号',
                        'value' => $acs['Flight']['flight_number'],
                        'class' => 'u-ipt'
                ),
                'Flight.departure_time' => array(
                        'label' => '计划出发日时',
                        'value' => $acs['Flight']['departure_time'],
                        'class' => 'u-dtm',
                        'dateFormat' => 'Y-M-D H:I',
                        'timeFormat' => '24'
                ),
                'Flight.real_departure_time' => array(
                        'label' => '实际出发日时',
                        'value' => $acs['Flight']['real_departure_time'],
                        'class' => 'u-dtm',
                        'dateFormat' => 'Y-M-D H:I',
                        'timeFormat' => '24'
                ),
                'Flight.departure_terminal_id' => array(
                        'label' => '出发地',
                        'type' => 'select',
                        'multiple' => false,
                        'options' => $Terminal,
                        'class' => 'u-pld',
                        'value' => $acs['Flight']['departure_terminal_id']
                ),
                'Flight.departure_terminal_gate' => array(
                        'label' => '登机口',
                        'class' => 'u-ipt',
                        'value' => $acs['Flight']['departure_terminal_gate']
                ),
                'Flight.arrival_time' => array(
                        'label' => '计划到着日时',
                        'value' => $acs['Flight']['arrival_time'],
                        'class' => 'u-dtm',
                        'dateFormat' => 'Y-M-D H:I',
                        'timeFormat' => '24'
                ),
                'Flight.real_arrival_time' => array(
                        'label' => '实际到着日时',
                        'value' => $acs['Flight']['real_arrival_time'],
                        'class' => 'u-dtm',
                        'dateFormat' => 'Y-M-D H:I',
                        'timeFormat' => '24'
                ),
                'Flight.arrival_terminal_id' => array(
                        'label' => '到着地',
                        'type' => 'select',
                        'multiple' => false,
                        'options' => $Terminal,
                        'class' => 'u-pld',
                        'value' => $acs['Flight']['arrival_terminal_id']
                ),
                'Flight.register_id' => array(
                        'label' => '飞机注册号',
                        'type' => 'select',
                        'multiple' => false,
                        'options' => $Register,
                        'value' => $acs['Flight']['register_id'],
                        'class' => 'u-pld'
                ),
                'Flight.seat_no' => array(
                        'label' => '座位号',
                        'value' => $acs['Flight']['seat_no'],
                        'class' => 'u-ipt'
                ),
                'Flight.meal' => array(
                        'label' => '餐食',
                        'value' => $acs['Flight']['meal'],
                        'class' => 'u-ipt'
                ),
                'Flight.memo' => array(
                        'label' => '备注',
                        'class' => 'u-txa',
                        'type' => 'textarea'
                )
        ), null, array(
                'div' => null,
                'legend' => '航班编辑'
        ));

echo $this->Form->button('重置', 
        array(
                'type' => 'reset',
                'class' => 'u-btn'
        ));

echo $this->Form->button('保存', 
        array(
                'type' => 'submit',
                'class' => 'u-btn'
        ));

echo $this->Form->button('返回', 
        array(
                'type' => 'button',
                'class' => 'u-btn',
                'onclick' => "location.href='/Flight';"
        ));

echo $this->Form->end();

if (isset($flyTo) && ! empty($flyTo)) {
    /**
     * TODO: No hard-coding
     */
    $popTtl = '保存失败';
    $popMsg = null;
    if ($this->Form->isFieldError('company_id')) {
        $popMsg .= $this->Form->error('Flight.company_id') . $this->Tag->br();
    }
    if ($this->Form->isFieldError('flight_number')) {
        $popMsg .= $this->Form->error('Flight.flight_number') . $this->Tag->br();
    }
    if ($this->Form->isFieldError('departure_terminal_id')) {
        $popMsg .= $this->Form->error('Flight.departure_terminal_id') .
                 $this->Tag->br();
    }
    if ($this->Form->isFieldError('departure_terminal_gate')) {
        $popMsg .= $this->Form->error('Flight.departure_terminal_gate') .
                 $this->Tag->br();
    }
    if ($this->Form->isFieldError('arrival_terminal_id')) {
        $popMsg .= $this->Form->error('Flight.arrival_terminal_id') .
                 $this->Tag->br();
    }
    if ($this->Form->isFieldError('register_id')) {
        $popMsg .= $this->Form->error('Flight.register_id') . $this->Tag->br();
    }
    if ($this->Form->isFieldError('seat_no')) {
        $popMsg .= $this->Form->error('Flight.seat_no') . $this->Tag->br();
    }
    if (empty($popMsg)) {
        $popTtl = '保存成功';
        $popMsg = '航班保存成功';
    }
    echo $this->Tag->popup($popTtl, $popMsg, "", $flyTo);
}