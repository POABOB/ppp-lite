<?php

namespace core\lib;
use core\lib\config;
class model extends \PDO
{
	public function __construct()
	{
		// $dsn = 'mysql:host=localhost;dbname=test;charset=utf8';
		// $username = 'root';
		// $password = 'root';
		$database = config::all('database');
		// p($database);
		try {
			parent::__construct($database['DSN'], $database['USERNAME'], $database['PASSWORD']);
		} catch (\PDOException $e) {
			p($e->getMessage());
		}
	}
}