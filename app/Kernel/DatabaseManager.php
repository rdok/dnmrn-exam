<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Kernel;

use Exception;
use PDO;
use PDOException;

class DatabaseManager
{
	private static $instance;
	private $dbConnection;

	private function __construct()
	{
		try
		{
			$this->dbConnection =
				new PDO("mysql:host=" . App::getDbHost() . ";dbname=" . App::getDbName() .
					";port=" . App::getDbPort(), App::getDbUsername(),
					App::getDbPassword());

			$this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, App::getPDOErrorMode()); // CHANGE THE ERROR MODE, THROW AN EXCEPTION WHEN AN ERROR IS FOUND

			$this->dbConnection->exec("SET NAMES 'utf8'");

		} catch (PDOException $e)
		{
			throw new Exception("Could not connect to the database." . $e->getMessage());
		}
	}

	public static function getConnection()
	{
		return self::getInstance();
	}

	private static function getInstance()
	{
		if ( ! self::$instance ) self::$instance = new self();

		return self::$instance->dbConnection;
	}

	public function __clone()
	{
		throw new Exception("Can't clone a singleton.");
	}
}