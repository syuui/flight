<?php
/**
 * view for CompanyController::index
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */
echo $this->Form->create();
echo $this->Form->input('keyword', 
        [
                'type' => 'text',
                'class' => 'u-ipt'
        ]);
echo $this->Form->submit('Search', [
        'class' => 'u-btn'
]);
echo $this->Form->end();