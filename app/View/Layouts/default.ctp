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
                'function',
                'layout',
                'controller',
                'custom'
        )) . PHP_EOL;
echo $this->fetch('javascript');
?>
<title><?php	echo $title_for_layout;	?></title>
</head>
<body>
	<!--	网站头	-->
<?php	echo $this->Element('logo');?>
<!--	/网站头	-->

	<!--	左侧菜单栏	-->
<?php 	echo $this->Element('leftmenu');?>
<!--	/左侧菜单栏	-->

	<!--	正文	-->
	<div class="g-mn">
<?php echo $this->fetch('content');	?>
</div>
	<!--	/正文	-->

	<!--	网站脚	-->
<?php 	echo $this->Element('foot');?>
<!--	/网站脚	-->

<?php
/**
 * TODO: remove
 */
echo $this->Tag->br(2);

if (Configure::read('debug') > 0) :
    Debugger::checkSecurityKeys();

endif;
?>
</body>
</html>