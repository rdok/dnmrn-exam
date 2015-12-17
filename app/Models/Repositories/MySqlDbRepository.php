<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Models\Repositories;

use App\Kernel\DbManager;
use Exception;
use PDO;

abstract class MySqlDbRepository implements DbRepository
{
	protected $tableName;

	function __construct($tableName)
	{
		$this->tableName = $tableName;
	}

	/**
	 * @param array $fields
	 * @return mixed
	 * @throws Exception
	 */
	public function getAll(array $fields = null)
	{
		$columns = "*";

		if ( $fields !== null )
		{
			$columns = "";

			foreach ($fields as $field)
			{
				$columns .= "$field, ";
			}

			$columns = substr($columns, 0, -2);
		}

		$query = "SELECT $columns FROM `{$this->tableName}`";

		if ( $query = DbManager::getConnection()->query($query) )
		{
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		return false;
	}

	public function count()
	{
		$query = "SELECT COUNT(*) FROM `{$this->tableName}`";

		if ( $query = DbManager::getConnection()->query($query) )
		{
			return intval($query->fetchColumn(0));
		}

		return false;
	}
}