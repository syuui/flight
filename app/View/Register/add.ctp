<?php

/**
 * view for CompanyController::add
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */
echo $this->Html->script('register_edit');

echo $this->Form->create("", 
        array(
                "type" => "POST",
                "onsubmit" => "",
                "url" => array(
                        'controller' => 'Register',
                        'action' => 'save'
                )
        ));
echo $this->Html->div('waiting', $this->Html->image('waiting.gif'), 
        [
                'id' => 'waiting'
        ]);

echo $this->Form->inputs(
        array(
                'Register.register_no' => array(
                        'label' => '注册号',
                        'class' => 'u-ipt',
                        'onfocus' => 'gotFocus();',
                        'onblur' => 'lostFocus();'
                ),
                'Register.aircraft_id' => array(
                        'label' => '机型',
                        'type' => 'select',
                        'multiple' => false,
                        'options' => $Aircraft,
                        'class' => 'u-pld'
                ),
                'Register.company_id' => array(
                        'label' => '航空公司',
                        'type' => 'select',
                        'multiple' => false,
                        'options' => $Company,
                        'class' => 'u-pld'
                ),
                'Register.register_date' => array(
                        'label' => '注册日期',
                        'class' => 'u-dtm',
                        'dateFormat' => 'Y-M-D',
                        'minYear' => '1990',
                        'maxYear' => date('Y')
                )
        ), null, 
        array(
                'div' => null,
                'legend' => '飞机注册号追加'
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
                'onclick' => "location.href='/Register';"
        ));
echo $this->Form->end();

echo $this->Html->div('hint', '', [
        'id' => 'HintRegModel'
]);
echo $this->Html->div('hint', '', [
        'id' => 'HintRegCompany'
]);
echo $this->Html->div('hint', '', [
        'id' => 'HintRegDate'
]);

if (isset($flyTo)) {
    /**
     * TODO: No hard-coding
     */
    $popTtl = '出错啦';
    $popMsg = null;
    if ($this->Form->isFieldError('Register.register_no')) {
        $popMsg .= $this->Form->error('Register.register_no') . $this->Tag->br();
    }
    
    if (empty($popMsg)) {
        $popTtl = '搞定啦';
        $popMsg = '飞机注册号保存成功';
    }
    echo $this->Tag->popup($popTtl, $popMsg, "", $flyTo);
}

echo $this->Html->scriptBlock("$(\"#RegisterRegisterNo\").blur(getRegInfo)");