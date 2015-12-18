<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Models\Repositories\Users;

use App\Kernel\App;
use App\Kernel\DbManager;
use App\Models\Company;
use App\Models\Repositories\MySqlDbRepository;
use App\Models\User;
use PDO;

class MySqlDbUsersRepository extends MySqlDbRepository implements UsersRepository
{
	public function __construct()
	{
		parent::__construct(User::$tableName);
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

		$query = "SELECT * FROM `" . App::getDbName() . "`.`" . User::$tableName . "` " .
			"LEFT JOIN `" . Company::$tableName . "` ON `" . Company::$tableName . "`.`" . Company::$columnUserId . "` = `" . User::$tableName . "`.`" . User::$columnPrimaryKey . "` " .
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

	/**
	 * @param $userId
	 * @return mixed
	 */
	public function getById($userId)
	{
		$query =
			"SELECT * FROM `" . App::getDbName() . "`.`" . User::$tableName . "` " .
			"INNER JOIN `" . Company::$tableName . "` ON `" . Company::$tableName . "`.`" . Company::$columnUserId . "` = `" . User::$tableName . "`.`" . User::$columnPrimaryKey . "` " .
			"WHERE `" . User::$tableName . "`.`" . User::$columnPrimaryKey . "` = :user_id ";

		$query = DbManager::getConnection()->prepare($query);
		$query->bindParam(':user_id', $userId, PDO::PARAM_STR);

		if ( $query->execute() )
		{
			return $query->fetch(PDO::FETCH_ASSOC);
		}

		return false;
	}
}