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
                        'controller' => 'Company',
                        'action' => 'save'
                )
        ));

echo $this->Form->inputs(
        array(
                'Company.icao_code' => array(
                        'label' => 'ICAO CODE',
                        'class' => 'u-ipt'
                ),
                'Company.iata_code' => array(
                        'label' => 'IATA CODE',
                        'class' => 'u-ipt'
                ),
                'Company.ccode' => array(
                        'label' => '国家',
                        'type' => 'select',
                        'multiple' => false,
                        'options' => $Country,
                        'selected' => 'CN',
                        'class' => 'u-pld'
                ),
                'Company.cname' => array(
                        'label' => '中文商号',
                        'class' => 'u-ipt'
                ),
                'Company.ename' => array(
                        'label' => '英文商号',
                        'class' => 'u-ipt'
                )
        ), null, 
        array(
                'div' => null,
                'legend' => '航空公司信息追加'
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
                'onclick' => "location.href='/Company';"
        ));

echo $this->Form->end();

if (isset($flyTo)) {
    /**
     * TODO: No hard-coding
     */
    $popTtl = '出错啦';
    $popMsg = null;
    if ($this->Form->isFieldError('Company.icao_code')) {
        $popMsg .= $this->Form->error('Company.icao_code') . $this->Tag->br();
    }
    if ($this->Form->isFieldError('Company.iata_code')) {
        $popMsg .= $this->Form->error('Company.iata_code') . $this->Tag->br();
    }
    if ($this->Form->isFieldError('Company.ccode')) {
        $popMsg .= $this->Form->error('Company.ccode') . $this->Tag->br();
    }
    if ($this->Form->isFieldError('Company.cname')) {
        $popMsg .= $this->Form->error('Company.cname') . $this->Tag->br();
    }
    if ($this->Form->isFieldError('Company.ename')) {
        $popMsg .= $this->Form->error('Company.ename') . $this->Tag->br();
    }
    if (empty($popMsg)) {
        $popTtl = '搞定啦';
        $popMsg = '航空公司' . $_POST['data']['Company']['cname'] . '保存成功';
    }
    echo $this->Tag->popup($popTtl, $popMsg, "", $flyTo);
}