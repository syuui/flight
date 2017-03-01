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

echo $this->Form->button('新增', array (
	'class' => 'u-btn',
	'type' => 'button',
	'onclick' => 'location.href=\'/Aircraft/add\''
));

echo "<table class=\"m-table\">";

echo $this->html->tableHeaders(array (
	array (
		'机型' => array (
			'width' => '10%'
		)
	),
	array (
		'制造商' => array (
			'width' => '10%'
		)
	),
	array (
		'长度（米）' => array (
			'width' => '10%'
		)
	),
	array (
		'翼展（米）' => array (
			'width' => '10%'
		)
	),
	array (
		'高度（米）' => array (
			'width' => '10%'
		)
	),
	array (
		'最大航程(公里)' => array (
			'width' => '10%'
		)
	),
	array (
		'巡航速度（公里/小时）' => array (
			'width' => '10%'
		)
	),
	array (
		'最大巡航高度（米）' => array (
			'width' => '10%'
		)
	),
	array (
		'发动机数' => array (
			'width' => '10%'
		)
	),
	array (
		'&nbsp;' => array (
			'width' => '10%'
		)
	)
));

foreach ($acs as $ln) {
	echo $this->html->tableCells(array (
		$ln['Aircraft']['model'],
		$ln['Aircraft']['manufacturer'],
		$ln['Aircraft']['length'],
		$ln['Aircraft']['wingspan'],
		$ln['Aircraft']['height'],
		$ln['Aircraft']['max_range'],
		$ln['Aircraft']['curising_speed'],
		$ln['Aircraft']['max_altitude'],
		$ln['Aircraft']['engines'],
		$this->Form->button('编辑',
		array (
			'class' => 'u-btn',
			'type' => 'button',
			'onclick' => "location.href='/Aircraft/edit/" . $ln['Aircraft']['id'] . "'"
		)
	) .
	$this->Form->button('删除', array (
		'class' => 'u-btn',
		'type' => 'button',
		'onclick' => "if(confirm('真的删除此机型吗？'))location.href='/Aircraft/del/" . $ln['Aircraft']['id'] . "'"
	))));
}

echo "</table>";

echo $this->Form->button('新增', array (
	'class' => 'u-btn',
	'type' => 'button',
	'onclick' => 'location.href=\'/Aircraft/add\''
));

$this->Tag->br(2);

if (Configure :: read('debug') > 0)
	: Debugger :: checkSecurityKeys();
endif;
?>
