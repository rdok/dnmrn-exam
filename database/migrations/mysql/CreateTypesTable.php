<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\migrations\mysql;

use App\Kernel\App;
use Database\migrations\MySqlMigration;

class CreateTypesTable extends MySqlMigration
{
	public static $tableName = 'types';
	public static $columnPrimaryKey = 'id';
	public static $columnName = 'name';

	/**
	 * Run the migrations
	 * @return mixed
	 */
	public function up()
	{
		$query =
			"CREATE TABLE `" . App::getDbName() . "`.`" . self::$tableName . "` (" .
			"`" . self::$columnPrimaryKey . "` INT NOT NULL AUTO_INCREMENT," .
			"`" . self::$columnName . "` VARCHAR(45) NOT NULL," .
			"PRIMARY KEY (`" . self::$columnPrimaryKey . "`) ," .
			"UNIQUE INDEX `" . self::$columnName . "_UNIQUE` (`" . self::$columnName . "` ASC));";

		$this->db->getConnection()->prepare($query)->execute();

		echo "Table '" . self::$tableName . "' created.\n";
	}

	public function getTableName()
	{
		return self::$tableName;
	}
}