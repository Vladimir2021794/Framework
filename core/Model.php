<?php
	namespace Core;
	
	 abstract class Model
	{
		private $link;
        protected $table;
        
		public function __construct()
		{
			if (!self::$link) {
				$config = require "/config/db";
				self::$link = mysqli_connect($config['host'], $config['login'], $config['password'], $config['dbname']);
				mysqli_query(self::$link, "SET NAMES 'utf8'");
			}
		}
		
		protected function findOne($query)
		{
			$result = mysqli_query(self::$link, $query) or die(mysqli_error(self::$link));
			return mysqli_fetch_assoc($result);
		}
		
		protected function findMany($query)
		{
			$result = mysqli_query(self::$link, $query) or die(mysqli_error(self::$link));
			for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
			
			return $data;
		}

        static public function getAll($table){
            $result =  DB::query('SELECT * FROM ' . $table);
            return $result;
        }
	}
