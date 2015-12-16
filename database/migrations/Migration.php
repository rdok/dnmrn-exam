<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace database\migrations;

use App\Kernel\DbManager;

abstract class Migration
{
	public static $columnCreatedAt = "created_at";
	public static $columnCreatedAtFormat = "Y-m-d H:i:s";
	public static $columnUpdatedAt = "updated_at";
	public static $columnUpdateAtFormat = "Y-m-d H:i:s";
	protected $db;

	public function __construct(DbManager $db = null)
	{
		$this->db = is_null($db) ? (new MySqlDatabase()) : $db;
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
			->prepare("TRUNCATE TABLE `" . $this->db->credentialsLoader->getDbName() . "`.`" . $this->getTableName() . "`");
		$this->db->getConnection()
			->prepare("DROP TABLE IF EXISTS `" . $this->db->credentialsLoader->getDbName() . "`.`" . $this->getTableName() . "`")
			->execute();
		echo "Destroy " . $this->getTableName() . " table complete.\n";
	}

	protected abstract function getTableName();
}