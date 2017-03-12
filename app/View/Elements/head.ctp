<?php
echo $this->Html->link(
        $this->Html->image('flight.png', 
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
?>