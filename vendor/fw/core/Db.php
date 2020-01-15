<?php
	
	
	namespace fw\core;
	
	
	use PDO;
	use R;
	use fw\core\base\TSingleton;
	
	class Db
	{
		
		use TSingleton;
		
		protected $pdo;
		public static $countSql = 0;
		public static $queries = [];
		
		protected function __construct()
		{
			$db = require ROOT . '/config/db.php';
			require LIBS . '/rb.php';
			/*$options = [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			];*/
			R::setup($db['dsn'], $db['user'], $db['password']);
			R::freeze(true);
//			R::fancyDebug(true);
			/*$this->pdo = new PDO($db['dsn'], $db['user'], $db['password'], $options);*/
		}
		
		public function execute($sql, $params = [])
		{
			self::$countSql++;
			self::$queries[] = $sql;
			$stmt = $this->pdo->prepare($sql);
			return $stmt->execute($params);
		}
		
		public function query($sql, $params = [])
		{
			self::$countSql++;
			self::$queries[] = $sql;
			$stmt = $this->pdo->prepare($sql);
			$res = $stmt->execute($params);
			if ($res !== false){
				return $stmt->fetchAll();
			}
			return [];
		}
		
	}