<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\migrations\mysql;

use App\Kernel\App;
use App\Models\Type;
use Database\migrations\MySqlMigration;

class CreateTypesTable extends MySqlMigration
{

	/**
	 * Run the migrations
	 * @return mixed
	 */
	public function up()
	{
		$query =
			"CREATE TABLE `" . App::getDbName() . "`.`" . Type::$tableName . "` (" .
			"`" . Type::$columnPrimaryKey . "` INT NOT NULL AUTO_INCREMENT," .
			"`" . Type::$columnName . "` VARCHAR(45) NOT NULL," .
			"PRIMARY KEY (`" . Type::$columnPrimaryKey . "`) ," .
			"UNIQUE INDEX `" . Type::$columnName . "_UNIQUE` (`" . Type::$columnName . "` ASC));";

		$this->db->getConnection()->prepare($query)->execute();

		echo "Table '" . Type::$tableName . "' created.\n";
	}

	public function getTableName()
	{
		return Type::$tableName;
	}
}