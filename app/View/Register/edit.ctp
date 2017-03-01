<?php


/**
 * view for CompanyController::edit, CompanyController::save
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Company
 * @since         CakePHP(tm) v 0.10.0.1076
 */

if (!Configure :: read('debug'))
	: throw new NotFoundException();
endif;
App :: uses('Debugger', 'Utility');

echo $this->Form->create("", array (
	"type" => "POST",
	"onsubmit" => "",
	"url" => array (
		'controller' => 'Register',
		'action' => 'save'
	)
));

echo $this->Form->inputs(array (
	'Register.id' => array (
		'type' => 'hidden',
		'value' => $acs['Register']['id']
	),
	'Register.register_no' => array (
		'label' => '注册号',
		'value' => $acs['Register']['register_no'],
		'class' => 'u-ipt'
	),
	'Register.aircraft_id' => array (
		'label' => '机型',
		'type' => 'select',
		'multiple' => false,
		'options' => $Aircraft,
		'selected' => $acs['Register']['aircraft_id'],
		'class' => 'u-pld'
	),
	'Register.company_id' => array (
		'label' => '航空公司',
		'type' => 'select',
		'multiple' => false,
		'options' => $Company,
		'selected' => $acs['Register']['company_id'],
		'class' => 'u-pld'
	),
	'Register.register_date' => array (
		'label' => '注册日时',
		'value' => $acs['Register']['register_date'],
		'class' => 'u-dtm',
		'dateFormat' => 'Y-M-D'
	)
), null, array (
	'div' => null,
	'legend' => '飞机注册号信息编辑'
));

echo $this->Form->button('重置', array (
	'type' => 'reset',
	'class' => 'u-btn'
));

echo $this->Form->button('保存', array (
	'type' => 'submit',
	'class' => 'u-btn'
));

echo $this->Form->button('返回', array (
	'type' => 'button',
	'class' => 'u-btn',
	'onclick' => "location.href='/Register';"
));

echo $this->Form->end();


if (isset ($flyTo)) {
	/**
	 * TODO: No hard-coding
	 */
	$popTtl = '保存失败';
	$popMsg = null;
	if ($this->Form->isFieldError('Register.register_no')) {
		$popMsg .= $this->Form->error('Register.register_no') . $this->Tag->br();
	}

	if (empty ($popMsg)) {
		$popTtl = '保存成功';
		$popMsg = '飞机注册号保存成功';
	}
	$this->Tag->popup($popTtl, $popMsg, "", $flyTo);
}


/**
 * TODO: Remove following BRs
 */
echo $this->Tag->br(2);

if (Configure :: read('debug') > 0)
	: Debugger :: checkSecurityKeys();
endif;
?>
