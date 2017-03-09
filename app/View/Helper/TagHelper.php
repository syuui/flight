<?php
App::uses('Helper', 'View');

/**
 * Tag helper
 *
 * 自定义helper，用于输出一些常用共通的DIV组件
 *
 * @package app.View.Helper
 */
class TagHelper extends AppHelper
{

    public function popup ($title = null, $message = null, $hint = null, $flyTo = null)
    {
        $val = '<script language="JavaScript">';
        $val .= 'function removeLayer() {' . PHP_EOL .
                 '_lyr=document.getElementById(\'popup_win\');' . PHP_EOL .
                 '_lyr.parentNode.removeChild(_lyr);' . PHP_EOL;
        if (! empty($flyTo)) {
            $val .= 'location.href=\'' . $flyTo . '\';' . PHP_EOL;
        }
        $val .= '}</script>' . PHP_EOL;
        $val .= '<div class="m-layer z-show" id="popup_win">';
        $val .= '<table><tbody><tr><td>';
        $val .= '<article class="lywrap"><header class="lytt"><h2 class="u-tt">';
        $val .= $title;
        $val .= '</h2><span class="lyclose" onclick="removeLayer();">×</span>';
        $val .= '</header><section class="lyct"><p>';
        $val .= $message;
        $val .= '</p></section>';
        $val .= '<footer class="lybt"><div class="lyother"><p>';
        $val .= $hint;
        $val .= '</p></div><div class="lybtns">';
        $val .= '<button type="button" class="u-btn" onclick="removeLayer();">确定</button>';
        $val .= '</div></footer></article></td></tr></tbody></table></div>';
        return $val;
    }

    public function br ($num = 1, $eol = false)
    {
        $val = "";
        for ($i = 0; $i < $num; $i ++)
            $val .= "<br />";
        
        if ($eol)
            $val .= PHP_EOL;
        
        return $val;
    }

    public function bar ($value)
    {
        $width = round($value / 100, 2) * 100;
        return sprintf(
                '<div class="progress-container">
                <div class="progress-bar" style="width: %s%%"></div>
            </div>', $width);
    }
}
?>