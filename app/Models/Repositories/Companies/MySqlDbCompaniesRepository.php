<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Models\Repositories\Companies;

use App\Models\Company;
use App\Models\Repositories\MySqlDbRepository;

class MySqlDbCompaniesRepository extends MySqlDbRepository implements CompaniesRepository
{
	public function __construct()
	{
		parent::__construct(Company::$tableName);
	}

}