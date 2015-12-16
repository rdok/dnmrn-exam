<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\migrations\mysql;

use App\Kernel\App;
use Database\migrations\MySqlMigration;

class AddTypeToVesselTable extends MySqlMigration
{
	private $tableNameVessels = 'vessels';
	private $tableNameTypes = 'types';
	private $columnTypeId = 'type_id';
	private $columnForeignKey = 'id';
	private $columnName = 'name';
	private $indexTypesVessels = 'types_vessels_id_index';
	private $foreignTypesVessels = 'types_vessels_id_foreign';

	/**
	 * Run the migrations
	 * @return mixed
	 */
	public function up()
	{
		$query =
			"ALTER TABLE `" . App::getDbName() . "`.`{$this->tableNameVessels}`
			ADD COLUMN `{$this->columnTypeId}` INT NULL COMMENT '' AFTER `{$this->columnName}`,
			ADD INDEX `{$this->indexTypesVessels}` (`{$this->columnTypeId}` ASC)  COMMENT '';";

		$this->db->getConnection()->prepare($query)->execute();

		$query =
			"ALTER TABLE `" . App::getDbName() . "`.`{$this->tableNameVessels}`
			ADD CONSTRAINT `{$this->foreignTypesVessels}`
			  FOREIGN KEY (`{$this->columnTypeId}`)
			  REFERENCES `" . App::getDbName() . "`.`{$this->tableNameTypes}` (`{$this->columnForeignKey}`)
			  ON DELETE RESTRICT
			  ON UPDATE CASCADE;";

		$this->db->getConnection()->prepare($query)->execute();

		echo "Added type to vessels table.\n";
	}

	public function getTableName()
	{
		return $this->tableNameVessels;
	}
}