<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version());

echo $this->Html->docType();
?>
<html>
<head>
<?php
	echo $this->Html->charset();
	echo $this->Html->meta('keywords','flights number',array());
	echo $this->Html->meta('description','Personal Homepage for syuui',array());
	echo $this->Html->meta('viewport','width=device-width');
	echo $this->Html->meta('favicon.ico','/img/favicon.ico',array('type' => 'icon'));
	echo $this->Html->css('reset');
	echo $this->Html->css('function');
	echo $this->Html->css('layout');
	echo $this->Html->css('controller');
	echo $this->Html->css('custom');
?>
<title><?php	echo $title_for_layout;	?></title>
</head>
<body>
<!--	网站头	-->
<div class="g-hd">
	<?php	echo $this->Html->image('flight.jpg');	?>
</div>
<!--	/网站头	-->

<!--	左侧菜单栏	-->
<div class="g-sd">
	<div class="m-list">
		<h3>- 航空公司 -</h3>
		<div class="m-li"><?php	echo $this->Html->link('航空公司', '/Company');	?></div><br />
		<h3>- 飞机 -</h3>
		<div class="m-li"><?php	echo $this->Html->link('飞机型号', '/Aircraft');	?></div><br />
		<div class="m-li"><?php	echo $this->Html->link('飞机注册号', '/Register');	?></div><br />
		<h3>- 机场 -</h3>
		<div class="m-li"><?php	echo $this->Html->link('机场', '/Airport');	?></div><br />
		<div class="m-li"><?php	echo $this->Html->link('航站楼', '/Terminal');	?></div><br />
		<h3>- 航班 -</h3>
		<div class="m-li"><?php echo $this->Html->link('航班', '/Flight');	?></div><br />
	</div>
</div>
<!--	/左侧菜单栏	-->

<!--	正文	-->
<div class="g-mn">
<?php echo $this->fetch('content');	?>
</div>
<!--	/正文	-->

<!--	网站脚	-->
<div class="g-ft">
<hr>
Copyright (C) 2016 by <?php	echo $this->Html->link('syuui','mailto:syuui@sohu.com',array());	?>. All rights reserved.<br />
声明：除特别声明，本站一切内容版权属于作者，受法律保护。没有作者书面许可不得转载。<br />
若作者同意转载，必须以超链接形式标明文章原始出处和作者。<br />
[ 京ICP证XXXXXX号 京公网安备000000000000 ]<br />
<?php echo $this->element('sql_dump'); ?>
</div>
<!--	/网站脚	-->

</body>
</html>