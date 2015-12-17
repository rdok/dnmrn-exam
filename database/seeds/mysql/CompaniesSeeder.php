<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\seeds\mysql;

use App\Kernel\App;
use App\Models\Company;
use Database\seeds\Seeder;

class CompaniesSeeder extends Seeder
{
	private $popularCompanies = ['A.P. Møller-Maersk', 'Mediterranean Shipping Company', 'CMA CGM', 'American President Lines (APL)', 'Hapag-Lloyd', 'Evergreen Line', 'COSCO Container Lines (COSCON)', 'China Shipping Container Lines', 'Hanjin Shipping Company'];

	/**
	 * @return mixed
	 */
	public function run()
	{
		foreach (range(1, 7) as $index)
		{
			$name = $this->faker->unique()->randomElement($this->popularCompanies);

			$query =
				"INSERT INTO `" . App::getDbName() . "`.`" . Company::$tableName . "` " .
				"(`" . Company::$columnName . "`) " .
				"VALUES ('$name')";

			$this->db->getConnection()->query($query);
		}

		echo "Seed for '" . Company::$tableName . "' table complete.\n";
	}
}