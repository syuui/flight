<?php

/**
 * SaveBlankDataException 
 * 自定义异常，在试图保存空数据时抛出
 * 此异常通常在用户通过URL直接访问控制器的save方法时产生
 * 
 * @author 周威 <syuui@sohu.com>
 *
 */
class SaveBlankDataException extends CakeException
{

    protected $_messageTemplate = '在 %s 中抛出了SaveBlankData异常.';

    public $errorTitle = '呀，出错啦！';

    public $errorHint = '猛击‘确定’';

    public $errorMessage = '我们这里出了个错</p><p>您还是先回首页看看吧。</p>';

    public $errorFlyTo = '/';

    function __construct ($message, $code = 500)
    {
        parent::__construct($message, $code);
        if (! empty($this->message) && ! is_array($this->message)) {
            $this->errorMessage = $this->message;
        }
    }
}
