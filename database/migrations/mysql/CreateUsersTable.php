<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\migrations\mysql;

use App\Kernel\App;
use App\Models\User;
use Database\migrations\MySqlMigration;

/**
 * Class CreateUsersTable
 * @package Database\migrations\mysql
 */
class CreateUsersTable extends MySqlMigration
{

	/**
	 * Run the migrations
	 * @return mixed
	 */
	public function up()
	{
		$query =
			"CREATE TABLE `" . App::getDbName() . "`.`" . User::$tableName . "` (" .
			"`" . User::$columnPrimaryKey . "` INT NOT NULL AUTO_INCREMENT, " .
			"`" . User::$columnFirstName . "` VARCHAR(45) NULL, " .
			"`" . User::$columnLastName . "` VARCHAR(45) NULL, " .
			"`" . User::$columnEmail . "` VARCHAR(255) NOT NULL, " .
			"`" . User::$columnPassword . "` VARCHAR(60) NOT NULL, " .
			"PRIMARY KEY (`" . User::$columnPrimaryKey . "`), " .
			"UNIQUE INDEX `" . User::$columnEmail . "_UNIQUE` (`" . User::$columnEmail . "` ASC));";

		$this->db->getConnection()->prepare($query)->execute();

		echo "Table '" . User::$tableName . "' created.\n";
	}

	/**
	 * @return string
	 */
	public function getTableName()
	{
		return User::$tableName;
	}
}