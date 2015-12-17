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
use App\Models\Type;
use App\Models\User;
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
		$query = "SELECT * FROM `" . App::getDbName() . "`.`" . Vessel::$tableName . "` " .
			"LEFT JOIN `" . Company::$tableName . "` ON `" . Company::$tableName . "`.`" . Company::$columnPrimaryKey . "` = `" . Vessel::$tableName . "`.`" . Vessel::$columnCompanyId . "` " .
			"LEFT JOIN `" . Type::$tableName . "` ON `" . Type::$tableName . "`.`" . Type::$columnPrimaryKey . "` = `" . Vessel::$tableName . "`.`" . Vessel::$columnTypeId . "` " .
			"LEFT JOIN `" . User::$tableName . "` ON `" . User::$tableName . "`.`" . User::$columnPrimaryKey . "` = `" . Company::$tableName . "`.`" . Company::$columnUserId . "`";

		if ( $query = DbManager::getConnection()->query($query) )
		{
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		return false;
	}
}