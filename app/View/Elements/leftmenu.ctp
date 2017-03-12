
<div class="m-list">
	<ul>
		<li><?php
echo $this->Html->link(
        $this->Html->image('company.jpg', 
                array(
                        'alt' => '航空公司'
                )) . '航空公司', 
        array(
                'controller' => 'Company',
                'action' => 'index'
        ), array(
                'escape' => false
        ));
?></li>
		<li><?php

echo $this->Html->link(
        $this->Html->image('flight.jpg', 
                array(
                        'alt' => '航班'
                )) . '航班', 
        array(
                'controller' => 'Flight',
                'action' => 'index'
        ), array(
                'escape' => false
        ));
?></li>
		<li><?php

echo $this->Html->link(
        $this->Html->image('airport.jpg', 
                array(
                        'alt' => '机场'
                )) . '机场', 
        array(
                'controller' => 'Airport',
                'action' => 'index'
        ), array(
                'escape' => false
        ));
?></li>
		<li><?php

echo $this->Html->link(
        $this->Html->image('terminal.jpg', 
                array(
                        'alt' => '航站楼'
                )) . '航站楼', 
        array(
                'controller' => 'Terminal',
                'action' => 'index'
        ), array(
                'escape' => false
        ));
?></li>
		<li><?php

echo $this->Html->link(
        $this->Html->image('aircraft.jpg', 
                array(
                        'alt' => '机型'
                )) . '机型', 
        array(
                'controller' => 'Aircraft',
                'action' => 'index'
        ), array(
                'escape' => false
        ));
?></li>
		<li><?php

echo $this->Html->link(
        $this->Html->image('register.jpg', 
                array(
                        'alt' => '注册号'
                )) . '注册号', 
        array(
                'controller' => 'Register',
                'action' => 'index'
        ), array(
                'escape' => false
        ));
?></li>
	</ul>
</div>