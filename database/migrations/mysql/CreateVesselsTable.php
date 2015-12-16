<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\migrations\mysql;

use App\Kernel\App;
use Database\migrations\MySqlMigration;

class CreateVesselsTable extends MySqlMigration
{
	public static $tableName = 'vessels';
	public static $columnPrimaryKey = 'id';
	public static $columnImo = 'imo';
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
			"`" . self::$columnImo . "` VARCHAR(45) NOT NULL," .
			"`" . self::$columnName . "` VARCHAR(45) NOT NULL," .
			"PRIMARY KEY (`" . self::$columnPrimaryKey . "`) ," .
			"UNIQUE INDEX `" . self::$columnImo . "_UNIQUE` (`" . self::$columnImo . "` ASC)," .
			"UNIQUE INDEX `" . self::$columnName . "_UNIQUE` (`" . self::$columnName . "` ASC));";

		$this->db->getConnection()->prepare($query)->execute();

		echo "Table '" . self::$tableName . "' created.\n";
	}

	public function getTableName()
	{
		return self::$tableName;
	}
}