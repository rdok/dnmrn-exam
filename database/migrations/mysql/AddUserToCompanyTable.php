<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\migrations\mysql;

use App\Kernel\App;
use Database\migrations\MySqlMigration;

class AddUserToCompanyTable extends MySqlMigration
{
	private $tableNameCompanies = 'companies';
	private $tableNameUsers = 'users';
	private $columnUserId = 'user_id';
	private $columnForeignKey = 'id';
	private $columnName = 'name';
	private $indexCompaniesUsers = 'companies_users_id_index';
	private $foreignCompaniesUsers = 'companies_users_id_foreign';

	/**
	 * Run the migrations
	 * @return mixed
	 */
	public function up()
	{
		$query =
			"ALTER TABLE `" . App::getDbName() . "`.`{$this->tableNameCompanies}`
			ADD COLUMN `{$this->columnUserId}` INT NOT NULL COMMENT '' AFTER `{$this->columnName}`,
			ADD INDEX `{$this->indexCompaniesUsers}` (`{$this->columnUserId}` ASC)  COMMENT '';";

		$this->db->getConnection()->prepare($query)->execute();

		$query =
			"ALTER TABLE `" . App::getDbName() . "`.`{$this->tableNameCompanies}`
			ADD CONSTRAINT `{$this->foreignCompaniesUsers}`
			  FOREIGN KEY (`{$this->columnUserId}`)
			  REFERENCES `" . App::getDbName() . "`.`{$this->tableNameUsers}` (`{$this->columnForeignKey}`)
			  ON DELETE RESTRICT
			  ON UPDATE CASCADE;";

		$this->db->getConnection()->prepare($query)->execute();

		echo "Added company to vessels table.\n";
	}

	public function getTableName()
	{
		return $this->tableNameCompanies;
	}
}