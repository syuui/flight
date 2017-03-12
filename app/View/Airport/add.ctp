<?php

/**
 * view for CompanyController::add
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */
echo $this->Form->create("", 
        array(
                "type" => "POST",
                "onsubmit" => "",
                "url" => array(
                        'controller' => 'Airport',
                        'action' => 'save'
                )
        ));

echo $this->Form->inputs(
        array(
                'Airport.icao_code' => array(
                        'label' => 'ICAO CODE',
                        'class' => 'u-ipt'
                ),
                'Airport.iata_code' => array(
                        'label' => 'IATA CODE',
                        'class' => 'u-ipt'
                ),
                'Airport.cname' => array(
                        'label' => '中文商号',
                        'class' => 'u-ipt'
                ),
                'Airport.ename' => array(
                        'label' => '英文商号',
                        'class' => 'u-ipt'
                ),
                'Airport.country_id' => array(
                        'label' => '国家',
                        'type' => 'select',
                        'multiple' => false,
                        'options' => $Country,
                        'selected' => 'CN',
                        'class' => 'u-pld'
                ),
                'Airport.zipcode' => array(
                        'label' => '邮政编码',
                        'class' => 'u-ipt'
                ),
                'Airport.address' => array(
                        'label' => '地址',
                        'class' => 'u-ipt'
                ),
                'Airport.runway' => array(
                        'label' => '跑道数',
                        'class' => 'u-ipt'
                )
        ), null, array(
                'div' => null,
                'legend' => '机场信息追加'
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
                'onclick' => "location.href='/Airport';"
        ));

echo $this->Form->end();

if (isset($flyTo)) {
    /**
     * TODO: No hard-coding
     */
    $popTtl = '出错啦';
    $popMsg = null;
    if ($this->Form->isFieldError('Airport.icao_code')) {
        $popMsg .= $this->Form->error('Airport.icao_code') . $this->Tag->br();
    }
    if ($this->Form->isFieldError('Airport.iata_code')) {
        $popMsg .= $this->Form->error('Airport.iata_code') . $this->Tag->br();
    }
    if ($this->Form->isFieldError('Airport.cname')) {
        $popMsg .= $this->Form->error('Airport.cname') . $this->Tag->br();
    }
    if ($this->Form->isFieldError('Airport.ename')) {
        $popMsg .= $this->Form->error('Airport.ename') . $this->Tag->br();
    }
    if ($this->Form->isFieldError('Airport.ccode')) {
        $popMsg .= $this->Form->error('Airport.ccode') . $this->Tag->br();
    }
    if ($this->Form->isFieldError('Airport.zipcode')) {
        $popMsg .= $this->Form->error('Airport.zipcode') . $this->Tag->br();
    }
    if ($this->Form->isFieldError('Airport.address')) {
        $popMsg .= $this->Form->error('Airport.address') . $this->Tag->br();
    }
    if ($this->Form->isFieldError('Airport.runway')) {
        $popMsg .= $this->Form->error('Airport.runway') . $this->Tag->br();
    }
    
    if (empty($popMsg)) {
        $popTtl = '搞定啦';
        $popMsg = '机场' . $_POST['data']['Airport']['cname'] . '保存成功';
    }
    echo $this->Tag->popup($popTtl, $popMsg, "", $flyTo);
}