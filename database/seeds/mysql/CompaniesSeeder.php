<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\seeds\mysql;

use App\Kernel\App;
use Database\migrations\mysql\CreateCompaniesTable;
use Database\seeds\Seeder;

class CompaniesSeeder extends Seeder
{

	/**
	 * @return mixed
	 */
	public function run()
	{
		foreach (range(0, 13) as $index)
		{
			$name = $this->faker->unique()->company();

			$query =
				"INSERT INTO `" . App::getDbName() . "`.`" . CreateCompaniesTable::$tableName . "` " .
				"(`" . CreateCompaniesTable::$columnName . "`) " .
				"VALUES ('$name')";

			$this->db->getConnection()->query($query);
		}

		echo "Seed for '" . CreateCompaniesTable::$tableName . "' table complete.\n";
	}
}