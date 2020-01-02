<?php

namespace core;

class ppp
{
	//紀錄類，避免重複加載
	public static $classMap = array();
	public $assign;

	//執行
	static public function run()
	{
		// p('ok');
		$route = new \core\lib\route();
		// p($route);

		//先定義原本index為Controller，如果非index的話，則套入別的名字
		$controllerfile = APP.'/controller/Controller.php';
		$controllerClass = '\\'.MODULE.'\controller\Controller';
		//我index控制器叫Controller，所以控制器是index的話其class為空
		if($route->controller != 'index') {
			$controllerfile = APP.'/controller/'.$controllerClass.'Controller.php';
			$controllerClass = '\\'.MODULE.'\controller\\'.$route->controller.'Controller';
		}
		//方法
		$action = $route->action;

		//如果存在檔案，則使用
		if(is_file($controllerfile)) {
			//引入控制器
			include $controllerfile;
			//初始化
			$controller = new $controllerClass();
			//使用方法
			$controller->$action();
		} else {
			throw new \Exception('找不到控制器'.$controllerClass);
		}
	}

	static public function load($class)
	{
		//自動加載類庫
		//new \core\route();
		//$class = '\core\route';
		//PPP.'\core\route.php';

		//如果Map裡頭已經加載，就返回true
		if(isset($classMap[$class])) {
			return true;
		} else {
			//替換\\成/
			$class = str_replace('\\', '/', $class);
			$file = PPP.'/'.$class.'.php';
			//如果有這個php，直接加載
			if(is_file($file)) {
				include $file;
				//因為為靜態陣列，使用self來call，再加入Map中
				self::$classMap[$class] = $class;
			} else {
				return false;
			}
		}	
	}
	//賦值給視圖
	public function assign($name, $value)
	{
		$this->assign[$name] = $value;
	}
	//顯示html或是php
	public function display($file)
	{
		$file = APP.'/views/'.$file;
		if(is_file($file)) {
			extract($this->assign);
			include $file;
		}
	}
}