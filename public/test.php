<?php
	require 'rb.php';
	$db = require '../config/db.php';
	R::setup($db['dsn'], $db['user'], $db['password']);
//	var_dump(R::testConnection());
	$cat = R::dispense('category');
//	var_dump($cat);
	$cat->title = 'Category 2';
	$id = R::store($cat);
	var_dump($id);