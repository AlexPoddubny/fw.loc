<?php
	
	
	namespace app\models;
	
	
	use fw\core\base\Model;
	
	class User
		extends Model
	{
		
		public $table = 'users';
		
		public $attributes = [
			'login' => '',
			'password' => '',
			'name' => '',
			'email' => '',
			'role' => 'user'
		];
		
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
		
/*		public function load($data)
		{
			parent::load($data);
			$this->attributes['password'] = password_hash($this->attributes['password'], PASSWORD_DEFAULT);
		}*/
		
		public function checkUnique()
		{
			$user = \R::findOne(
				$this->table,
				'login = ? OR email = ? LIMIT 1',
				[
					$this->attributes['login'],
					$this->attributes['email']
				]
			);
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
		
	}