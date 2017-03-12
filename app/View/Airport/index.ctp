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
	'onclick' => 'location.href=\'/Airport/add\''
));

echo "<table class=\"m-table\">";

echo $this->html->tableHeaders(array (
	array (
		'ICAO Code' => array (
			'width' => '5%'
		)
	),
	array (
		'IATA Code' => array (
			'width' => '5%'
		)
	),
	array (
		'中文商号' => array (
			'width' => '15%'
		)
	),
	array (
		'英文商号' => array (
			'width' => '20%'
		)
	),
	array (
		'国家' => array (
			'width' => '5%'
		)
	),
	array (
		'邮政编码' => array (
			'width' => '5%'
		)
	),
	array (
		'地址' => array (
			'width' => '30%'
		)
	),
	array (
		'跑道数' => array (
			'width' => '5%'
		)
	),
	array (
		'&nbsp;' => array (
			'width' => '10%'
		)
	)
));

foreach ($data as $ln) {
	echo $this->html->tableCells(array (
		$ln['Airport']['icao_code'],
		$ln['Airport']['iata_code'],
		$ln['Airport']['cname'],
		$ln['Airport']['ename'],
		$ln['Country']['cname'],
		$ln['Airport']['zipcode'],
		$ln['Airport']['address'],
		$ln['Airport']['runway'],
		$this->Form->button('编辑',
		array (
			'class' => 'u-btn',
			'type' => 'button',
			'onclick' => "location.href='/Airport/edit/" . $ln['Airport']['id'] . "'"
		)
	) .
	$this->Form->button('删除', array (
		'class' => 'u-btn',
		'type' => 'button',
		'onclick' => "if(confirm('真的删除此机场吗？'))location.href='/Airport/del/" . $ln['Airport']['id'] . "'"
	))));
}

echo "</table>";

echo $this->Form->button('新增', array (
	'class' => 'u-btn',
	'type' => 'button',
	'onclick' => 'location.href=\'/Airport/add\''
));