<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\migrations\mysql;

use App\Kernel\App;
use App\Models\Vessel;
use Database\migrations\MySqlMigration;

class CreateVesselsTable extends MySqlMigration
{

	/**
	 * Run the migrations
	 * @return mixed
	 */
	public function up()
	{
		$query =
			"CREATE TABLE `" . App::getDbName() . "`.`" . Vessel::$tableName . "` (" .
			"`" . Vessel::$columnPrimaryKey . "` INT NOT NULL AUTO_INCREMENT," .
			"`" . Vessel::$columnImo . "` VARCHAR(45) NOT NULL," .
			"`" . Vessel::$columnName . "` VARCHAR(45) NOT NULL," .
			"PRIMARY KEY (`" . Vessel::$columnPrimaryKey . "`) ," .
			"UNIQUE INDEX `" . Vessel::$columnImo . "_UNIQUE` (`" . Vessel::$columnImo . "` ASC)," .
			"UNIQUE INDEX `" . Vessel::$columnName . "_UNIQUE` (`" . Vessel::$columnName . "` ASC));";

		$this->db->getConnection()->prepare($query)->execute();

		echo "Table '" . Vessel::$tableName . "' created.\n";
	}

	public function getTableName()
	{
		return Vessel::$tableName;
	}
}