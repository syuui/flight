<?php

/**
 * view for CompanyController::add
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */
if (! Configure::read('debug')) :
    throw new NotFoundException();


endif;

App::uses('Debugger', 'Utility');

echo $this->Form->create("", 
        array(
                "type" => "POST",
                "onsubmit" => "",
                "url" => array(
                        'controller' => 'Terminal',
                        'action' => 'save'
                )
        ));

echo $this->Form->inputs(
        array(
                'Terminal.airport_id' => array(
                        'label' => '机场',
                        'type' => 'select',
                        'multiple' => false,
                        'options' => $Airport,
                        'class' => 'u-pld'
                ),
                'Terminal.abbreviation' => array(
                        'label' => '简称',
                        'class' => 'u-ipt'
                ),
                'Terminal.cname' => array(
                        'label' => '中文名称',
                        'class' => 'u-ipt'
                ),
                'Terminal.ename' => array(
                        'label' => '英文名称',
                        'class' => 'u-ipt'
                )
        ), null, 
        array(
                'div' => null,
                'legend' => '航站楼信息追加'
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
                'onclick' => "location.href='/Terminal';"
        ));

echo $this->Form->end();

if (isset($flyTo)) {
    /**
     * TODO: No hard-coding
     */
    $popTtl = '保存失败';
    $popMsg = null;
    if ($this->Form->isFieldError('Terminal.abbreviation')) {
        $popMsg .= $this->Form->error('Terminal.abbreviation') . $this->Tag->br();
    }
    if ($this->Form->isFieldError('Terminal.cname')) {
        $popMsg .= $this->Form->error('Terminal.cname') . $this->Tag->br();
    }
    if ($this->Form->isFieldError('Terminal.ename')) {
        $popMsg .= $this->Form->error('Terminal.ename') . $this->Tag->br();
    }
    
    if (empty($popMsg)) {
        $popTtl = '保存成功';
        $popMsg = '航站楼' . $_POST['data']['Terminal']['cname'] . '保存成功';
    }
    echo $this->Tag->popup($popTtl, $popMsg, "", $flyTo);
}