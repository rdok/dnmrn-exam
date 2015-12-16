<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\migrations\mysql;

use App\Kernel\App;
use Database\migrations\MySqlMigration;

/**
 * Class CreateUsersTable
 * @package Database\migrations\mysql
 */
class CreateUsersTable extends MySqlMigration
{
	/**
	 * @var string
	 */
	public static $tableName = 'users';
	/**
	 * @var string
	 */
	public static $columnFirstName = 'f_name';
	/**
	 * @var string
	 */
	public static $columnLastName = 'l_name';
	/**
	 * @var string
	 */
	public static $columnEmail = 'email';
	/**
	 * @var string
	 */
	public static $columnPassword = 'password';
	/**
	 * @var string
	 */
	public static $columnPrimaryKey = 'id';

	/**
	 * Run the migrations
	 * @return mixed
	 */
	public function up()
	{
		$query =
			"CREATE TABLE `" . App::getDbName() . "`.`" . self::$tableName . "` (" .
			"`" . self::$columnPrimaryKey . "` INT NOT NULL AUTO_INCREMENT," .
			"`" . self::$columnFirstName . "` VARCHAR(45) NULL," .
			"`" . self::$columnLastName . "` VARCHAR(45) NULL," .
			"`" . self::$columnEmail . "` VARCHAR(255) NOT NULL," .
			"`" . self::$columnPassword . "` VARCHAR(60) NOT NULL," .
			"PRIMARY KEY (`" . self::$columnPrimaryKey . "`) ," .
			"UNIQUE INDEX `" . self::$columnEmail . "_UNIQUE` (`" . self::$columnEmail . "` ASC));";

		$this->db->getConnection()->prepare($query)->execute();

		echo "Table '" . self::$tableName . "' created.\n";
	}

	/**
	 * @return string
	 */
	public function getTableName()
	{
		return self::$tableName;
	}
}