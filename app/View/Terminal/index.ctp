<?php
/**
 * view for CompanyController::index
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

echo $this->Form->button('新增', array (
	'class' => 'u-btn',
	'type' => 'button',
	'onclick' => 'location.href=\'/Terminal/add\''
));

echo "<table class=\"m-table\">";

echo $this->Html->tableHeaders(array (
	array (
		'机场' => array (
			'width' => '20%'
		)
	),
	array (
		'简称' => array (
			'width' => '20%'
		)
	),
	array (
		'中文名称' => array (
			'width' => '20%'
		)
	),
	array (
		'英文名称' => array (
			'width' => '20%'
		)
	),
	array (
		'&nbsp;' => array (
			'width' => '20%'
		)
	)
));

foreach ($data as $ln) {
	echo $this->Html->tableCells(array (
		$ln['Airport']['cname'],
		$ln['Terminal']['abbreviation'],
		$ln['Terminal']['cname'],
		$ln['Terminal']['ename'],
		$this->Form->button('编辑',
		array (
			'class' => 'u-btn',
			'type' => 'button',
			'onclick' => "location.href='/Terminal/edit/" . $ln['Terminal']['id'] . "'"
		)
	) .
	$this->Form->button('删除', array (
		'class' => 'u-btn',
		'type' => 'button',
		'onclick' => "if(confirm('真的删除此机场吗？'))location.href='/Terminal/del/" . $ln['Terminal']['id'] . "'"
	))));
}

echo "</table>";

echo $this->Form->button('新增', array (
	'class' => 'u-btn',
	'type' => 'button',
	'onclick' => 'location.href=\'/Terminal/add\''
));