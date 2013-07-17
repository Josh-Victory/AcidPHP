<?php

class Core
{
	public static $database = null;
	public static $users = null;

	public static function initialize() 
	{	
		self::$database = new Database();
		self::$users = new Users();
	}
}

?>