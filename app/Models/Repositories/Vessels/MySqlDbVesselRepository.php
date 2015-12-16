<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Models\Repositories\Vessels;

use App\Models\Repositories\MySqlDbRepository;
use App\Models\Vessel;

class MySqlDbVesselRepository extends MySqlDbRepository implements VesselRepository
{
	public function __construct()
	{
		parent::__construct(Vessel::$tableName);
	}

}