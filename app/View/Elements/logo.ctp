<div class="g-hd">
<?php
echo $this->Html->link(
        $this->Html->image('logo.jpg', 
                array(
                        'alt' => 'LOGO'
                )), 
        array(
                'controller' => 'pages',
                'action' => 'display',
                'home'
        ), array(
                'escape' => false
        ));
?></div>
