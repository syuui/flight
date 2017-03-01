<?php


/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App :: uses('Helper', 'View');

/**
 * DIV helper
 *
 * 自定义helper，用于输出一些常用共通的DIV组件
 *
 * @package       app.View.Helper
 */
class TagHelper extends AppHelper {

	public function popup($title = null, $message = null, $hint = null, $flyTo = null) {
		echo '<script language="JavaScript">';
		echo 'function removeLayer() {' . PHP_EOL .
		'_lyr=document.getElementById(\'popup_win\');' . PHP_EOL .
		'_lyr.parentNode.removeChild(_lyr);' . PHP_EOL;
		if (!empty ($flyTo)) {
			echo 'location.href=\'' . $flyTo . '\';' . PHP_EOL;
		}
		echo '}</script>' . PHP_EOL;
		echo '<div class="m-layer z-show" id="popup_win">';
		echo '<table><tbody><tr><td>';
		echo '<article class="lywrap"><header class="lytt"><h2 class="u-tt">';
		echo $title;
		echo '</h2><span class="lyclose" onclick="removeLayer();">×</span>';
		echo '</header><section class="lyct"><p>';
		echo $message;
		echo '</p></section>';
		echo '<footer class="lybt"><div class="lyother"><p>';
		echo $hint;
		echo '</p></div><div class="lybtns">';
		echo '<button type="button" class="u-btn" onclick="removeLayer();">确定</button>';
		echo '</div></footer></article></td></tr></tbody></table></div>';
	}

	public function br($num = 1) {
		$val = null;
		for ($i = 0; $i < $num; $i++) {
			$val .= "<br />";
		}
		return $val;
	}
}
?>