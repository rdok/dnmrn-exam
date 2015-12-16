<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\migrations\mysql;

use App\Kernel\App;
use Database\migrations\MySqlMigration;

class AddCompanyToVesselTable extends MySqlMigration
{
	private $tableNameVessels = 'vessels';
	private $tableNameCompanies = 'companies';
	private $columnCompanyId = 'company_id';
	private $columnForeignKey = 'id';
	private $columnName = 'name';
	private $indexCategoriesVessels = 'companies_vessels_id_index';
	private $foreignCompaniesVessels = 'companies_vessels_id_foreign';

	/**
	 * Run the migrations
	 * @return mixed
	 */
	public function up()
	{
		$query =
			"ALTER TABLE `" . App::getDbName() . "`.`{$this->tableNameVessels}`
			ADD COLUMN `{$this->columnCompanyId}` INT NOT NULL COMMENT '' AFTER `{$this->columnName}`,
			ADD INDEX `{$this->indexCategoriesVessels}` (`{$this->columnCompanyId}` ASC)  COMMENT '';";

		$this->db->getConnection()->prepare($query)->execute();

		$query =
			"ALTER TABLE `" . App::getDbName() . "`.`{$this->tableNameVessels}`
			ADD CONSTRAINT `{$this->foreignCompaniesVessels}`
			  FOREIGN KEY (`{$this->columnCompanyId}`)
			  REFERENCES `" . App::getDbName() . "`.`{$this->tableNameCompanies}` (`{$this->columnForeignKey}`)
			  ON DELETE RESTRICT
			  ON UPDATE CASCADE;";

		$this->db->getConnection()->prepare($query)->execute();

		echo "Added company to vessels table.\n";
	}

	public function getTableName()
	{
		return $this->tableNameVessels;
	}
}