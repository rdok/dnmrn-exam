<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\migrations\mysql;

use App\Kernel\App;
use App\Models\Type;
use App\Models\Vessel;
use Database\migrations\MySqlMigration;

class AddTypeToVesselTable extends MySqlMigration
{

	/**
	 * Run the migrations
	 * @return mixed
	 */
	public function up()
	{
		$query =
			"ALTER TABLE `" . App::getDbName() . "`.`" . Vessel::$tableName . "` " .
			"ADD COLUMN `" . Vessel::$columnTypeId . "` INT NULL, " .
			"ADD INDEX `" . Vessel::$indexTypesVessels . "` (`" . Vessel::$columnTypeId . "` ASC);";

		$this->db->getConnection()->prepare($query)->execute();

		$query =
			"ALTER TABLE `" . App::getDbName() . "`.`" . Vessel::$tableName . "` " .
			"ADD CONSTRAINT `" . Vessel::$foreignTypesVessels . "` " .
			"FOREIGN KEY (`" . Vessel::$columnTypeId . "`) " .
			"REFERENCES `" . App::getDbName() . "`.`" . Type::$tableName . "` (`" . Type::$columnPrimaryKey. "`) " .
			"ON DELETE RESTRICT ON UPDATE CASCADE;";

		$this->db->getConnection()->prepare($query)->execute();

		echo "Added type to vessels table.\n";
	}

	public function getTableName()
	{
		return Vessel::$tableName;
	}
}