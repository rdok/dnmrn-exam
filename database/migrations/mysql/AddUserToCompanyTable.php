<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\migrations\mysql;

use App\Kernel\App;
use App\Models\Company;
use App\Models\User;
use Database\migrations\MySqlMigration;

class AddUserToCompanyTable extends MySqlMigration
{

	/**
	 * Run the migrations
	 * @return mixed
	 */
	public function up()
	{
		$query =
			"ALTER TABLE `" . App::getDbName() . "`.`" . Company::$tableName . "` " .
			"ADD COLUMN `" . Company::$columnUserId . "` INT NULL, " .
			"ADD INDEX `" . Company::$indexCompaniesUsers . "` (`" . Company::$columnUserId . "` ASC);";

		$this->db->getConnection()->prepare($query)->execute();

		$query =
			"ALTER TABLE `" . App::getDbName() . "`.`" . Company::$tableName . "` " .
			"ADD CONSTRAINT `" . Company::$foreignCompaniesUsers . "` " .
			"FOREIGN KEY (`" . Company::$columnUserId . "`) " .
			"REFERENCES `" . App::getDbName() . "`.`" . User::$tableName . "` (`" . User::$columnPrimaryKey . "`) " .
			"ON DELETE RESTRICT	ON UPDATE CASCADE;";

		$this->db->getConnection()->prepare($query)->execute();

		echo "Added user to company table.\n";
	}

	public function getTableName()
	{
		return Company::$tableName;
	}
}