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
	'onclick' => 'location.href=\'/Company/add\''
));

echo "<table class=\"m-table\">";

echo $this->html->tableHeaders(array (
	array (
		'ICAO Code' => array (
			'width' => '10%'
		)
	),
	array (
		'IATA Code' => array (
			'width' => '10%'
		)
	),
	array (
		'CCODE' => array (
			'width' => '10%'
		)
	),
	array (
		'中文商号' => array (
			'width' => '25%'
		)
	),
	array (
		'英文商号' => array (
			'width' => '30%'
		)
	),
	array (
		'&nbsp;' => array (
			'width' => '15%'
		)
	)
));

foreach ($acs as $ln) {
	echo $this->Html->tableCells(array (
		$ln['Company']['icao_code'],
		$ln['Company']['iata_code'],
		$ln['Country']['cname'],
		$ln['Company']['cname'],
		$ln['Company']['ename'],
		$this->Form->button('编辑',
		array (
			'class' => 'u-btn',
			'type' => 'button',
			'onclick' => "location.href='/Company/edit/" . $ln['Company']['id'] . "'"
		)
	) .
	$this->Form->button('删除', array (
		'class' => 'u-btn',
		'type' => 'button',
		'onclick' => "if(confirm('真的删除此航空公司吗？'))location.href='/Company/del/" . $ln['Company']['id'] . "'"
	))));
}

echo "</table>";

echo $this->Form->button('新增', array (
	'class' => 'u-btn',
	'type' => 'button',
	'onclick' => 'location.href=\'/Company/add\''
));