<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\seeds\mysql;

use App\Kernel\App;
use App\Kernel\DbManager;
use App\Models\Company;
use Database\seeds\Seeder;

class CompaniesSeeder extends Seeder
{
	private $popularCompanies =
		['APM-Maersk', 'Mediterranean Shg Co', 'CMA CGM Group', 'Hapag-Lloyd', 'Evergreen Line', 'COSCO Container L.',
			'CSCL', 'Hamburg Süd Group', 'Hanjin Shipping', 'MOL', 'OOCL', 'Yang Ming Marine Transport Corp.', 'APL'];

	/**
	 * @return mixed
	 */
	public function run()
	{
		foreach (range(1, 3) as $index)
		{
			$name = $this->faker->unique()->randomElement($this->popularCompanies);

			$query =
				"INSERT INTO `" . App::getDbName() . "`.`" . Company::$tableName . "` " .
				"(`" . Company::$columnName . "`) " .
				"VALUES ('$name')";

			DbManager::getConnection()->query($query);
		}

		echo "Seed for '" . Company::$tableName . "' table complete.\n";
	}
}