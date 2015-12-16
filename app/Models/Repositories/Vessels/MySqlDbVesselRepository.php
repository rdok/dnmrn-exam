<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Models\Repositories\Vessels;

use App\Kernel\App;
use App\Kernel\DbManager;
use App\Models\Company;
use App\Models\Repositories\MySqlDbRepository;
use App\Models\Vessel;
use PDO;

class MySqlDbVesselRepository extends MySqlDbRepository implements VesselRepository
{
	public function __construct()
	{
		parent::__construct(Vessel::$tableName);
	}

	/**
	 * @return mixed
	 */
	public function getWithRelations()
	{
		$query =
			"SELECT * FROM `{$this->tableName}`" .
			"INNER JOIN `" . App::getDbName() . "`.`" . Company::$tableName . "`
				ON `" . $this->tableName . "`.`" . Vessel::$column . "` =
					`" . self::DB_TABLE . "`.`" . self::DB_COLUMN_COURSE_ID . "`";

		if ( $query = DbManager::getConnection()->query($query) )
		{
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		return false;
	}
}