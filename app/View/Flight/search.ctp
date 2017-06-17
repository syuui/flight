<?php
/**
 * view for CompanyController::index
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */
echo $this->Form->create();
echo $this->Form->input('keyword', [
        'type' => 'text'
]);
echo $this->Form->submit('Search');
echo $this->Form->end();