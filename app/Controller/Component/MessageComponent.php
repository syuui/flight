
<?php
define('INI_FILE_NAME', 'messages.ini');
define('LOG_LEVEL_FLAG_ERROR', 'E');
define('LOG_LEVEL_FLAG_DEBUG', 'D');
define('LOG_LEVEL_FLAG_INFO', 'I');
define('USER_LOG_FILE_NAME', TMP . 'logs\user.log');

/**
 * Message Component
 *
 * MessageComponent是全局的消息组件，用来向log文件输出用户级log.
 *
 * @copyright     Copyright (c) 2016 by syuui. All rights reserved.
 * @link
 * @package       app.Component
 * @since         CakePHP(tm) v 0.2.9
 * @license
 */
class MessageComponent extends Object {

	/**
	 * $_messages
	 *
	 * 消息数组。
	 * 此数组将在startup方法中，根据messages.ini中的设定赋值。
	 */
	private $_messages = null;

	/**
	 * debugLevel
	 *
	 * 	0: ERROR
	 * 	1: DEBUG
	 * 	2: INFO
	 */
	var $debugLevel = null;

	var $controller = true;

	/**
	 * initialize
	 *
	 * 此方法将在Controller的beforeFilter之前调用，此处无处理。
	 */
	function initialize() {
	}

	/**
	 * beforeRender
	 *
	 * 此方法将在Controller的Render之前调用，此处无处理。
	 */
	function beforeRender() {
	}

	/**
	 * beforeRender
	 *
	 * 此方法将在Controller的Redirect之前调用，此处无处理。
	 */
	function beforeRedirect() {
	}

	/**
	 * startup
	 *
	 * Component处理开始前的预处理。
	 */
	function startup(& $controller) {
		$this->debugLevel = Configure :: read('debug');
		$this->_messages = parse_ini_file(INI_FILE_NAME);
	}

	/**
	 * startup
	 *
	 * Component处理结束后的收尾处理。
	 */
	function shutdown() {
	}

	/**
	 * getCaller
	 *
	 * 此方法返回调用MessageComponent的类及方法名称。
	 *
	 * @return string
	 */
	private function getCaller() {
		$callerClass = 'UnknownClass';
		$callerMethod = 'UnknownMethod';
		$backTrace = debug_backtrace();

		for ($i = 0; $i < count($backTrace); $i++) {
			if ($backTrace[$i]['class'] != __CLASS__) {
				$callerClass = $backTrace[$i]['class'];
				$callerMethod = $backTrace[$i]['function'];
				break;
			}
		}
		return "[${callerClass}::${callerMethod}]";
	}

	/**
	 * getDateTime
	 *
	 * 此方法返回当前日期时间
	 *
	 * @return string
	 */
	private function getDateTime() {
		return date("Y-m-d H:i:s", time());
	}

	/**
	 * getPreMessage
	 *
	 * 此方法将当前日期时间以及调用MessageComponent的类及方法名称组合成字符串，
	 * 做为消息头返回。
	 *
	 * @return string
	 */
	private function getPreMessage() {
		return $this->getDateTime() . ' ' . $this->getCaller() . ' : ';
	}

	/**
	 * getMessageById
	 *
	 * 此方法以ID为键，返回其消息值。
	 * 如果ID为空或者不存在以ID为键的消息，则返回null。
	 *
	 * @return string
	 */
	public function getMessageById($id, $params = array ()) {
		if (empty ($id) || !array_key_exists($id, $this->_messages)) {
			return null;
		}
		$message = $this->_messages[$id];
		if (!empty ($params)) {
			for ($i = 0; $i < count($params) && $i <= 9; $i++) {
				$message = str_replace('#' . $i, $params[$i], $message);
			}
		}
		return $message;
	}

	/**
	 * saveLog
	 *
	 * 公开方法，用户将使用此方法保存LOG。
	 *
	 * @param string $msgId 消息ID
	 * @param array $params 消息可变参数，默认为空，可为0-9的10个参数
	 * @return void
	 */
	public function saveLog($msgId, $params = null) {
		if (substr($msgId, 0, 1) == LOG_LEVEL_FLAG_ERROR) {
			if ($this->debugLevel == '0' || $this->debugLevel == '1' || $this->debugLevel == '2') {
				$this->saveMessage($msgId, '[ERROR]', $params);
			}
		}
		elseif (substr($msgId, 0, 1) == LOG_LEVEL_FLAG_DEBUG) {
			if ($this->debugLevel == '1' || $this->debugLevel == '2') {
				$this->saveMessage($msgId, '[DEBUG]', $params);
			}
		}
		elseif (substr($msgId, 0, 1) == LOG_LEVEL_FLAG_INFO) {
			if ($this->debugLevel == '2') {
				$this->saveMessage($msgId, '[INFO]', $params);
			}
		}
		return;
	}

	/**
	 * saveMessage
	 *
	 * 根据$msgId取得消息内容，并附加消息头、换行等信息，最后保存到文件。
	 *
	 * @param string $msgId 消息ID
	 * @param string $logType 消息类型（ERROR、DEBUG、INFO）
	 * @param array $params 消息的可变参数
	 * @return void
	 */
	private function saveMessage($msgId, $logType, $params) {
		$message = $this->getMessageById($msgId, $params);

		$message = $logType . $this->getPreMessage() . $message . PHP_EOL;
		$this->saveFile($message);
	}

	/**
	 * saveFile
	 *
	 * 将消息保存至文件
	 *
	 * @param string $message 消息体
	 * @return void
	 */
	private function saveFile($message) {
		$file = fopen(USER_LOG_FILE_NAME, 'a+');
		if (!$file)
			return;

		fwrite($file, $message);
		fclose($file);
		return;
	}

}
?>
