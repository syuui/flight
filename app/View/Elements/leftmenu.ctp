
<div class="m-list">
	<ul>
		<li><?php
echo $this->Html->link(
        $this->Html->image('company.jpg', 
                [
                        'alt' => '航空公司'
                ]) . '航空公司', 
        [
                'controller' => 'Company',
                'action' => 'index'
        ], [
                'escape' => false
        ]);
?></li>
		<li>		<?php

echo $this->Html->link(
        $this->Html->image('flight.jpg', 
                [
                        'alt' => '航班'
                ]) . '航班', 
        [
                'controller' => 'Flight',
                'action' => 'index'
        ], [
                'escape' => false
        ]);
?>
			<ul>
				<li>
			<?php
echo $this->Html->link('一览', 
        [
                'controller' => 'Flight',
                'action' => 'index'
        ]);

?>
				</li>
				<li>
<?php
echo $this->Html->link('查询', [
        'controller' => 'Flight',
        'action' => 'search'
]);
?>
				</li>
			</ul>
		
		<li><?php

echo $this->Html->link(
        $this->Html->image('airport.jpg', 
                [
                        'alt' => '机场'
                ]) . '机场', 
        [
                'controller' => 'Airport',
                'action' => 'index'
        ], [
                'escape' => false
        ]);
?></li>
		<li><?php

echo $this->Html->link(
        $this->Html->image('terminal.jpg', 
                [
                        'alt' => '航站楼'
                ]) . '航站楼', 
        [
                'controller' => 'Terminal',
                'action' => 'index'
        ], [
                'escape' => false
        ]);
?></li>
		<li><?php

echo $this->Html->link(
        $this->Html->image('aircraft.jpg', 
                [
                        'alt' => '机型'
                ]) . '机型', 
        [
                'controller' => 'Aircraft',
                'action' => 'index'
        ], [
                'escape' => false
        ]);
?></li>
		<li><?php

echo $this->Html->link(
        $this->Html->image('register.jpg', 
                [
                        'alt' => '注册号'
                ]) . '注册号', 
        [
                'controller' => 'Register',
                'action' => 'index'
        ], [
                'escape' => false
        ]);
?></li>
	</ul>
</div>