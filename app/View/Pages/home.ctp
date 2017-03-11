<div id="tp">
	<h1>航班管家</h1>
	<ul>
		<li><?php echo $this->Html->link('航空公司', array('controller'=>'Company','action'=>'index'));?></li>
		<li><?php echo $this->Html->link('航班', array('controller'=>'Flight','action'=>'index'));?></li>
		<li><?php echo $this->Html->link('机场', array('controller'=>'Airport','action'=>'index'));?></li>
		<li><?php echo $this->Html->link('航站楼', array('controller'=>'Terminal','action'=>'index'));?></li>
		<li><?php echo $this->Html->link('机型', array('controller'=>'Aircraft','action'=>'index'));?></li>
		<li><?php echo $this->Html->link('注册号', array('controller'=>'Register','action'=>'index'));?></li>
	</ul>
</div>