<?php
	
	
	namespace app\models;
	
	
	use fw\core\base\Model;
	
	class User
		extends Model
	{
		
		public $table = 'users';
		
		/*public $attributes = [
			'login' => '',
			'password' => '',
			'name' => '',
			'email' => '',
			'role' => 'user'
		];*/
		
		public $rules = [
			'required' => [
				['login'],
				['password'],
				['name'],
				['email'],
			],
			'email' => [
				['email'],
			],
			'lengthMin' => [
				['password', 6],
			],
		];
		
		public function __construct()
		{
			parent::__construct();
			$this->getFields();
		}
		
		public function login($data)
		{
			$login = !empty(trim($data['login'])) ? trim($data['login']) : null;
			$password = !empty(trim($data['password'])) ? trim($data['password']) : null;
			if ($login && $password){
				$user = \R::findOne(
					$this->table,
					'login = ? LIMIT 1',
					[
						$login
					]);
				if ($user && password_verify($password, $user->password)){
					$_SESSION['user'] = [];
					foreach ($user as $k => $v){
						if ($k != 'password'){
							$_SESSION['user'][$k] = $v;
						}
					}
					debug($_SESSION);
					return true;
				}
			}
			return false;
		}
		
		public function checkUnique()
		{
			$user = \R::findOne(
				$this->table,
				'login = ? OR email = ? LIMIT 1',
				[
					$this->attributes['login'],
					$this->attributes['email']
				]);
			if ($user){
				if ($user->login == $this->attributes['login']){
					$this->errors['unique'][] = 'Login already exists';
				}
				if ($user->email == $this->attributes['email']){
					$this->errors['unique'][] = 'Email already exists';
				}
				return false;
			}
			return true;
		}
		
		public function getFields()
		{
			parent::getFields();
			$this->attributes['role'] = 'user';
		}
		
	}