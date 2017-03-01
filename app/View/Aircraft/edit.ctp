<?php

/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
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
		'controller' => 'Aircraft',
		'action' => 'save'
	)
));

echo $this->Form->inputs(array (
	'Aircraft.id' => array (
		'type' => 'hidden',
		'value' => $acs['Aircraft']['id']
	),
	'Aircraft.model' => array (
		'label' => '机型',
		'value' => $acs['Aircraft']['model'],
		'class' => 'u-ipt'
	),
	'Aircraft.manufacturer' => array (
		'label' => '制造商',
		'value' => $acs['Aircraft']['manufacturer'],
		'class' => 'u-ipt'
	),
	'Aircraft.length' => array (
		'label' => '长度（米）',
		'value' => $acs['Aircraft']['length'],
		'class' => 'u-ipt'
	),
	'Aircraft.wingspan' => array (
		'label' => '翼展（米）',
		'value' => $acs['Aircraft']['wingspan'],
		'class' => 'u-ipt'
	),
	'Aircraft.height' => array (
		'label' => '高度（米）',
		'value' => $acs['Aircraft']['height'],
		'class' => 'u-ipt'
	),
	'Aircraft.max_range' => array (
		'label' => '最大航程(公里)',
		'value' => $acs['Aircraft']['max_range'],
		'class' => 'u-ipt'
	),
	'Aircraft.curising_speed' => array (
		'label' => '巡航速度（公里/小时）',
		'value' => $acs['Aircraft']['curising_speed'],
		'class' => 'u-ipt'
	),
	'Aircraft.max_altitude' => array (
		'label' => '最大巡航高度（米）',
		'value' => $acs['Aircraft']['max_altitude'],
		'class' => 'u-ipt'
	),
	'Aircraft.engines' => array (
		'label' => '发动机数',
		'value' => $acs['Aircraft']['engines'],
		'class' => 'u-ipt'
	)
), null, array (
	'div' => null,
	'legend' => '机型信息编辑'
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
	'onclick' => "location.href='/Aircraft';"
));


echo $this->Form->end();

if (isset ($flyTo)) {
	/**
	 * TODO: No hard-coding
	 */
	$popTtl = '保存失败';
	$popMsg = null;
	if ($this->Form->isFieldError('Aircraft.model')) {
		$popMsg .= $this->Form->error('Aircraft.model') . $this->Tag->br();
	}
	if ($this->Form->isFieldError('Aircraft.manufacturer')) {
		$popMsg .= $this->Form->error('Aircraft.manufacturer') . $this->Tag->br();
	}
	if ($this->Form->isFieldError('Aircraft.length')) {
		$popMsg .= $this->Form->error('Aircraft.length') . $this->Tag->br();
	}
	if ($this->Form->isFieldError('Aircraft.wingspan')) {
		$popMsg .= $this->Form->error('Aircraft.wingspan') . $this->Tag->br();
	}
	if ($this->Form->isFieldError('Aircraft.height')) {
		$popMsg .= $this->Form->error('Aircraft.height') . $this->Tag->br();
	}
	if ($this->Form->isFieldError('Aircraft.max_range')) {
		$popMsg .= $this->Form->error('Aircraft.max_range') . $this->Tag->br();
	}
	if ($this->Form->isFieldError('Aircraft.curising_speed')) {
		$popMsg .= $this->Form->error('Aircraft.curising_speed') . $this->Tag->br();
	}
	if ($this->Form->isFieldError('Aircraft.max_altitude')) {
		$popMsg .= $this->Form->error('Aircraft.max_altitude') . $this->Tag->br();
	}
	if ($this->Form->isFieldError('Aircraft.engines')) {
		$popMsg .= $this->Form->error('Aircraft.engines') . $this->Tag->br();
	}
	if (empty ($popMsg)) {
		$popTtl = '保存成功';
		$popMsg = '机型' . $_POST['data']['Aircraft']['model'] . '保存成功';
	}
	$this->Tag->popup($popTtl, $popMsg, "", $flyTo);
}

if (Configure :: read('debug') > 0)
	: Debugger :: checkSecurityKeys();
endif;
?>