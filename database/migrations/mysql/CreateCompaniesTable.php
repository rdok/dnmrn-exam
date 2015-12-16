<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace database\migrations\mysql;

use App\Kernel\App;
use Database\migrations\MySqlMigration;

class CreateCompaniesTable extends MySqlMigration
{
	private $tableName = 'companies';
	private $columnPrimaryKey = 'id';
	private $columnName = 'name';

	/**
	 * Run the migrations
	 * @return mixed
	 */
	public function up()
	{
		$query =
			"CREATE TABLE `" . App::getDbName() . "`.`{$this->tableName}` (" .
			"`{$this->columnPrimaryKey}` INT NOT NULL AUTO_INCREMENT," .
			"`{$this->columnName}` VARCHAR(45) NOT NULL," .
			"PRIMARY KEY (`{$this->columnPrimaryKey}`) ," .
			"UNIQUE INDEX `{$this->columnName}_UNIQUE` (`{$this->columnName}` ASC));";

		$this->db->getConnection()->prepare($query)->execute();

		echo "Table '{$this->tableName}' created.\n";
	}

	public function getTableNameVessels()
	{
		return $this->tableName;
	}
}