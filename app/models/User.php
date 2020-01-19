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
		
		public function load($data)
		{
			parent::load($data);
			$this->attributes['password'] = password_hash($this->attributes['password'], PASSWORD_DEFAULT);
		}
		
	}