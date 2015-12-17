<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Models\Repositories\Companies;

use App\Kernel\App;
use App\Kernel\DbManager;
use App\Models\Company;
use App\Models\Repositories\MySqlDbRepository;
use App\Models\User;
use PDO;

class MySqlDbCompaniesRepository extends MySqlDbRepository implements CompaniesRepository
{
	public function __construct()
	{
		parent::__construct(Company::$tableName);
	}

	/**
	 * @param int $from
	 * @param int $to
	 * @return mixed
	 */
	public function getWithRelations($from = 1, $to = 10)
	{
		$offset = $from - 1;
		$rows = $to - $from + 1;

		$query = "SELECT * FROM `" . App::getDbName() . "`.`" . Company::$tableName . "` " .
			"LEFT JOIN `" . User::$tableName . "` ON `" . Company::$tableName . "`.`" . Company::$columnUserId . "` = `" . User::$tableName . "`.`" . User::$columnPrimaryKey . "` " .
			"LIMIT {$from}, {$to}";

		$query = DbManager::getConnection()->prepare($query);
		$query->bindParam(1, $offset, PDO::PARAM_INT);
		$query->bindParam(2, $rows, PDO::PARAM_INT);

		if ( $query->execute() )
		{
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		return false;
	}
}