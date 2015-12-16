<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Models\Repositories\Types;

use App\Models\Repositories\MySqlDbRepository;
use App\Models\Type;

class MySqlDbTypesRepository extends MySqlDbRepository implements TypesRepository
{
	/**
	 * MySqlDbTypesRepository constructor.
	 */
	public function __construct()
	{
		parent::__construct(Type::$tableName);
	}

}