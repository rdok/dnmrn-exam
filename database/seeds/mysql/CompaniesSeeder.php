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

	/**
	 * @return mixed
	 */
	public function run()
	{
		foreach (range(0, 7) as $index)
		{
			$name = $this->faker->unique()->company();

			$query =
				"INSERT INTO `" . App::getDbName() . "`.`" . Company::$tableName . "` " .
				"(`" . Company::$columnName . "`) " .
				"VALUES ('$name')";

			$this->db->getConnection()->query($query);
		}

		echo "Seed for '" . Company::$tableName . "' table complete.\n";
	}
}