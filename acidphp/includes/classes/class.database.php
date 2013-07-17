<?php

 #################################################
# AcidPHP - Free PHP Website written from scratch #
#          Contributors / Credits list            #
 #################################################
#             Josh - Creating AcidPHP             #
#           PHP.net - Examples of codes           #
#             Adam - Creating layout              #
 #################################################

 #####  ###### # #######
#     # #        #      #
#     # #      # #      #
####### #      # #      #
#     # #      # #      #
#     # ###### # ########

class Database
{
	private $pdo;
	
	public function Database()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=' . Configuration::getValue('mysql', 'hostname') . ';dbname=' . Configuration::getValue('mysql', 'database'), Configuration::getValue('mysql', 'username'), Configuration::getValue('mysql', 'password'));
		}
		catch (PDOException $ex)
		{
			echo 'Error while attempting to connect PDO, error: '  . $ex->getMessage();
		}
	}
	
	public function createResult($query)
	{
		return new DatabaseResult($this->pdo->prepare($query));
	}
}

class DatabaseResult
{
	private $statement;
	
	public function DatabaseResult($statement) 
	{
		$this->statement = $statement;
	}
	
	public function addParam($key, $value)
	{
		$this->statement->bindParam($key, $value);
	}
	
	public function fetch()
	{
		return $this->statement->fetch(PDO::FETCH_BOTH);
	}
	
	public function fetchTable()
	{
		return $this->statement->fetchAll();
	}
	
	public function fetchColumn()
	{
		return $this->statement->fetchColumn();
	}
	
	public function execute()
	{
		$this->statement->execute();
	}
	
	public function columnCount()
	{
		return $this->statement->columnCount();
	}
}

?>