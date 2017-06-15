<?php	echo $this->Html->docType()	 . PHP_EOL;	?>
<html>
<head>
<?php
echo $this->Html->charset() . PHP_EOL;
echo $this->Html->meta('keywords', 'flights number') . PHP_EOL;
echo $this->Html->meta('description', 'Personal Homepage for syuui') . PHP_EOL;
echo $this->Html->meta('viewport', 'width=device-width') . PHP_EOL;
echo $this->Html->meta('favicon.ico', '/favicon.ico', 
        array(
                'type' => 'icon'
        )) . PHP_EOL;
echo $this->Html->css(
        array(
                'reset',
                'layout',
                'controller',
                'custom'
        )) . PHP_EOL;
echo $this->Html->script([
        'jquery-3.2.1.min',
        'function'
]);
?>
	<title><?php	echo $title_for_layout;	?></title>
</head>
<body>
	<!--	网站头	-->
	<div class="g-hd">
<?php	echo $this->Element('head');?>
<!--	/网站头	-->
	</div>

	<!--	左侧菜单栏	-->
	<div class="g-sd">
<?php 	echo $this->Element('leftmenu');?>
</div>
	<!--	/左侧菜单栏	-->

	<!--	正文	-->
	<div class="g-mn">
<?php echo $this->fetch('content');	?>
</div>
	<!--	/正文	-->

</body>
</html>