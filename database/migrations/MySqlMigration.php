<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\migrations;

use App\Kernel\App;
use App\Kernel\DbManager;

abstract class MySqlMigration implements Migration
{
	protected $columnCreatedAt = "created_at";
	protected $columnCreatedAtFormat = "Y-m-d H:i:s";
	protected $columnUpdatedAt = "updated_at";
	protected $columnUpdateAtFormat = "Y-m-d H:i:s";
	protected $db;

	public function __construct(DbManager $db = null)
	{
		$this->db = is_null($db) ? (new DbManager()) : $db;
	}

	/**
	 * Run the migrations
	 * @return mixed
	 */
	public abstract function up();

	/**
	 * Reverse the migrations
	 */
	public function down()
	{
		$this->db->getConnection()
			->prepare("TRUNCATE TABLE `" . App::getDbName() . "`.`" . $this->getTableName() . "`")
			->execute();

		$this->db->getConnection()
			->prepare("DROP TABLE IF EXISTS `" . App::getDbName() . "`.`" . $this->getTableName() . "`")
			->execute();

		echo "'" . $this->getTableName() . "' table destroyed.\n";
	}
}