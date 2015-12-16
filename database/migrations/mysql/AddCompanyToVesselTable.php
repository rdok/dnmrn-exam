<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\migrations\mysql;

use App\Kernel\App;
use App\Models\Company;
use App\Models\Vessel;
use Database\migrations\MySqlMigration;

class AddCompanyToVesselTable extends MySqlMigration
{

	/**
	 * Run the migrations
	 * @return mixed
	 */
	public function up()
	{
		$query =
			"ALTER TABLE `" . App::getDbName() . "`.`" . Vessel::$tableName . "`" .
			"ADD COLUMN `" . Vessel::$columnCompanyId . "` INT NULL," .
			"ADD INDEX `" . Vessel::$indexCategoriesVessels . "` (`" . Vessel::$columnCompanyId . "` ASC);";

		$this->db->getConnection()->prepare($query)->execute();

		$query =
			"ALTER TABLE `" . App::getDbName() . "`.`" . Vessel::$tableName . "`" .
			"ADD CONSTRAINT `" . Vessel::$foreignCompaniesVessels . "`" .
			"FOREIGN KEY (`" . Vessel::$columnForeignKey . "`)" .
			"REFERENCES `" . App::getDbName() . "`.`" . Company::$tableName . "`) " .
			"ON DELETE RESTRICT ON UPDATE CASCADE;";

		$this->db->getConnection()->prepare($query)->execute();

		echo "Added company to vessels table.\n";
	}

	public function getTableName()
	{
		return Vessel::$tableName;
	}
}