<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');
?>
<table class="m-table">
<?php
	echo $this->Html->tableHeaders(array('英文国名','中文国名','CCODE','TCODE','英文代码'));
	foreach ( $countries as $ln ) {
		echo "<tr>";
		echo "<td>" . $ln['country']['ename'] . "</td>";
		echo "<td>" . $ln['country']['cname'] . "</td>";
		echo "<td>" . $ln['country']['ccode'] . "</td>";
		echo "<td>" . $ln['country']['tcode'] . "</td>";
		echo "<td>" . $ln['country']['continent'] . "</td>";
		echo "</tr>";
	}
?>
</table>

<br /><br />
<h2><?php echo __d('cake_dev', 'Release Notes for CakePHP %s.', Configure::version()); ?></h2>
<p>
	<?php echo $this->Html->link(__d('cake_dev', 'Read the changelog'), 'http://cakephp.org/changelogs/' . Configure::version()); ?>
</p>
<?php
if (Configure::read('debug') > 0):
	Debugger::checkSecurityKeys();
endif;
?>
