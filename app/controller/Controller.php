<?php

namespace app\controller;

class Controller extends \core\PPP
{
	public function index()
	{
		// p('function index()');
		// //初始化class
		// $model = new \core\lib\model();
		// //修改默認顯示級別
		// $model->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		// //預處理和執行
		// $statement = $model->prepare("select * from test where name = ?");
		// //綁定查詢值
		// $statement->bindValue(1,'耿映翔',\PDO::PARAM_STR);
		// $statement->execute();
		// //取不到返回false
		// // $row = $statement->fetch(\PDO::FETCH_ASSOC);
		// //取不到返回空array
		// $row = $statement->fetchAll(\PDO::FETCH_OBJ);

		// //DEBUG模式查看預處理參數
		// //$statement->debugDumpParams();


		// var_dump($row);  //输出参数类型和值
		// p($row);
		$data = '11';
		$this->assign('data', $data);
		$this->display('index.html');

		$temp = \core\lib\config::get('CONTROLLER', 'route');
		$temp = new \core\lib\model();
		// print_r($temp);


	}
}