<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\migrations\mysql;

use App\Kernel\App;
use App\Models\Company;
use Database\migrations\MySqlMigration;

class CreateCompaniesTable extends MySqlMigration
{

	/**
	 * Run the migrations
	 * @return mixed
	 */
	public function up()
	{
		$query =
			"CREATE TABLE `" . App::getDbName() . "`.`" . Company::$tableName . "` (" .
			"`" . Company::$columnPrimaryKey . "` INT NOT NULL AUTO_INCREMENT," .
			"`" . Company::$columnName . "` VARCHAR(45) NOT NULL," .
			"PRIMARY KEY (`" . Company::$columnPrimaryKey . "`) ," .
			"UNIQUE INDEX `" . Company::$columnName . "_UNIQUE` (`" . Company::$columnName . "` ASC));";

		$this->db->getConnection()->prepare($query)->execute();

		echo "Table '" . Company::$tableName . "' created.\n";
	}

	public function getTableName()
	{
		return Company::$tableName;
	}
}