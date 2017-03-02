<?php
/**
 * view for CompanyController::index
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */
if (!Configure :: read('debug'))
	: throw new NotFoundException();
endif;
App :: uses('Debugger', 'Utility');

echo $this->Form->button('新增', array (
	'class' => 'u-btn',
	'type' => 'button',
	'onclick' => 'location.href=\'/Register/add\''
));

echo "<table class=\"m-table\">";

echo $this->Html->tableHeaders(array (
	array (
		'注册号' => array (
			'width' => '20%'
		)
	),
	array (
		'机型' => array (
			'width' => '20%'
		)
	),
	array (
		'航空公司' => array (
			'width' => '20%'
		)
	),
	array (
		'注册日期' => array (
			'width' => '20%'
		)
	),
	array (
		'&nbsp;' => array (
			'width' => '20%'
		)
	)
));

foreach ($acs as $ln) {
	echo $this->Html->tableCells(array (
		$ln['Register']['register_no'],
		$ln['Aircraft']['model'],
		$ln['Company']['cname'],
		$ln['Register']['register_date'],
		$this->Form->button('编辑',
		array (
			'class' => 'u-btn',
			'type' => 'button',
			'onclick' => "location.href='/Register/edit/" . $ln['Register']['id'] . "'"
		)
	) .
	$this->Form->button('删除', array (
		'class' => 'u-btn',
		'type' => 'button',
		'onclick' => "if(confirm('真的删除此注册号吗？'))location.href='/Register/del/" . $ln['Register']['id'] . "'"
	))));
}

echo "</table>";

echo $this->Form->button('新增', array (
	'class' => 'u-btn',
	'type' => 'button',
	'onclick' => 'location.href=\'/Register/add\''
));

/**
 * TODO: Remove following BRs
 */
$this->Tag->br(2);

if (Configure :: read('debug') > 0)
	: Debugger :: checkSecurityKeys();
endif;
?>
