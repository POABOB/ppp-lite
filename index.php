<?php
/**
 * 入口文件
 * 1. 定義常量
 * 2. 加載涵式庫
 * 3. 啟動框架
 */

//定義根目錄
define('PPP', realpath('./'));
//定義核心文件目錄
define('CORE', PPP.'/core');
//定義app目錄
define('APP', PPP.'/app');
//定義app常量
define('MODULE','app');

//DEBUG模式開關
define('DEBUG', true);

if(DEBUG) {
	ini_set('display_error', 'On');
} else {
	ini_set('display_error', 'Off');
}


//加載涵式庫
include CORE.'/common/function.php';
include CORE.'/ppp.php';

//自動加載
spl_autoload_register('\core\ppp::load');


//啟動框架
//調用php run() (\core\前面是namespace)
\core\ppp::run();
