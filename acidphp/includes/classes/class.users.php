<?php

class Users
{
	public function tryLogin($name, $password) // Or do email later,
	{
		if (empty($name))
		{
			return 'Please insert your username!';
		}
		else if (empty($password))
		{
			return 'Please insert your password!';
		}
		
		$res = Core::$database->createResult('SELECT * FROM `members` WHERE `username` = :name LIMIT 1');
		$res->addParam(':name',  $name);
		$res->execute();
		
		if ($res->columnCount() < 1) 
		{
			return 'Username not found!';
		}
		
		$userrow = $res->fetch();
		
		if ($userrow['password'] != $password)
		{
			return 'Wrong password!';
		}
		
		$_SESSION['NAME'] = $name;
		$_SESSION['USER'] = $userrow;
		
		return true;
	}
}

?>