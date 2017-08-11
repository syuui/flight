<?php

/**
 * Aircraft Regiter Information Component
 *
 * ARI Component是数据查询组件，用来从互联网上取得民航飞行器注册信息.
 *
 * @copyright     Copyright (c) 2016 by syuui. All rights reserved.
 * @link
 * @package       app.Component
 * @since         CakePHP(tm) v 0.2.9
 * @license
 */
class ARIComponent extends Object
{

    const URL = "http://www.xmyzl.com/?mod=search";

    /**
     * initialize
     *
     * 此方法将在Controller的beforeFilter之前调用，此处无处理。
     */
    function initialize ()
    {}

    /**
     * beforeRender
     *
     * 此方法将在Controller的Render之前调用，此处无处理。
     */
    function beforeRender ()
    {}

    /**
     * beforeRender
     *
     * 此方法将在Controller的Redirect之前调用，此处无处理。
     */
    function beforeRedirect ()
    {}

    /**
     * startup
     *
     * Component处理开始前的预处理。
     */
    function startup (& $controller)
    {
        $this->debugLevel = Configure::read('debug');
        $this->_messages = parse_ini_file(INI_FILE_NAME);
    }

    /**
     * startup
     *
     * Component处理结束后的收尾处理。
     */
    function shutdown ()
    {}

    /**
     *
     * @return string
     */
    /**
     * getRegisterInformation
     *
     * 此方法返回注册号为$rid的航空器的注册信息数组。
     *
     * @param string $rid            
     * @return NULL[], 各元素代表意义如下：
     *         0：注册机号
     *         1：状态
     *         2：机型
     *         3：发动机
     *         4：航空公司
     *         5：归属
     *         6：引进时间
     *         7：首次交付
     *         8：序列号
     *         9：备注信息
     */
    public function getRegisterInformation ($rid)
    {
        $rlt = [];
        
        $pattern = '/^B-[0-9]{4}$/';
        if (is_string($rid) && 0 === preg_match($pattern, $rid)) {
            return $rlt;
        }
        
        $data = [
                'keyword' => $rid
        ];
        $data = http_build_query($data);
        
        $opts = [
                'http' => [
                        'method' => 'POST',
                        'header' => "Content-type: application/x-www-form-urlencoded\r\n" .
                                 "Content-Length: " . strlen($data) . "\r\n",
                                'content' => $data
                ]
        ];
        $ctx = stream_context_create($opts);
        $html = @file_get_contents(ARIComponent::URL, '', $ctx);
        
        if (! empty($html)) {
            $htmDoc = new DOMDocument();
            @$htmDoc->loadHTML($html);
            @$htmDoc->normalizeDocument();
            
            // 获得到此文档中每一个Table对象；
            $tables_list = $htmDoc->getElementsByTagName('table');
            
            // 测试Table Count；
            $tables_count = $tables_list->length;
            foreach ($tables_list as $table) {
                // 得到Table对象的class属性
                $tableProp = $table->getAttribute('class');
                if ($tableProp == 'table') {
                    $rows_list = $table->getElementsByTagName('tr');
                    
                    foreach ($rows_list as $row) {
                        $cells_list = $row->getElementsByTagName('td');
                        
                        $curCellIdx = 0;
                        foreach ($cells_list as $cell) {
                            $rlt[$curCellIdx ++] = $cell->nodeValue;
                        }
                    }
                }
            }
        }
        return $rlt;
    }
}
?>
