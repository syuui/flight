<?php
/**
 * view for Register::aircraftRegisterJson
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

/*
 *
 * @return NULL[], 各元素代表意义如下：
 * 0：注册机号
 * 1：状态
 * 2：机型
 * 3：发动机
 * 4：航空公司
 * 5：归属
 * 6：引进时间
 * 7：首次交付
 * 8：序列号
 * 9：备注信息
 */
echo '{';
if (! empty($ri)) {
    echo "\"regNo\":\"${ri[0]}\",";
    echo "\"status\":\"${ri[1]}\",";
    echo "\"model\":\"${ri[2]}\",";
    echo "\"engine\":\"${ri[3]}\",";
    echo "\"company\":\"${ri[4]}\",";
    echo "\"belongTo\":\"${ri[5]}\",";
    echo "\"regDate\":\"${ri[6]}\",";
    echo "\"deliverDate\":\"${ri[7]}\",";
    echo "\"serialNo\":\"${ri[8]}\",";
    echo "\"memo\":\"${ri[9]}\"";
}
echo '}';