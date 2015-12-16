<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\migrations\mysql;

use App\Kernel\App;
use Database\migrations\MySqlMigration;

class CreateUsersTable extends MySqlMigration
{
	private $tableName = 'users';
	private $columnPrimaryKey = 'id';
	private $columnFirstName = 'f_name';
	private $columnLastName = 'l_name';
	private $columnEmail = 'email';
	private $columnPassword = 'password';

	/**
	 * Run the migrations
	 * @return mixed
	 */
	public function up()
	{
		$query =
			"CREATE TABLE `" . App::getDbName() . "`.`{$this->tableName}` (" .
			"`{$this->columnPrimaryKey}` INT NOT NULL AUTO_INCREMENT," .
			"`{$this->columnFirstName}` VARCHAR(45) NULL," .
			"`{$this->columnLastName}` VARCHAR(45) NULL," .
			"`{$this->columnEmail}` VARCHAR(255) NOT NULL," .
			"`{$this->columnPassword}` VARCHAR(60) NOT NULL," .
			"PRIMARY KEY (`{$this->columnPrimaryKey}`) ," .
			"UNIQUE INDEX `{$this->columnEmail}_UNIQUE` (`{$this->columnEmail}` ASC));";

		$this->db->getConnection()->prepare($query)->execute();

		echo "Table '{$this->tableName}' created.\n";
	}

	public function getTableName()
	{
		return $this->tableName;
	}
}