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
echo $this->Html->css(array(
        'toppage'
)) . PHP_EOL;
echo $this->fetch('javascript');
?>
<title><?php	echo $title_for_layout;	?></title>
</head>
<body>
<?php echo $this->fetch('content');?>
</body>
</html>