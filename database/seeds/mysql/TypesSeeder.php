<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\seeds\mysql;

use App\Kernel\App;
use Database\migrations\mysql\CreateTypesTable;
use Database\seeds\Seeder;

class TypesSeeder extends Seeder
{

	/**
	 * @return mixed
	 */
	public function run()
	{
		foreach (range(0, 13) as $index)
		{
			$name = $this->faker->name();

			$query =
				"INSERT INTO `" . App::getDbName() . "`.`" . CreateTypesTable::$tableName . "` " .
				"(`" . CreateTypesTable::$columnName . "`) " .
				"VALUES ('$name')";

			$this->db->getConnection()->query($query);
		}
		echo "Seed for '" . CreateTypesTable::$tableName . "' table complete.\n";
	}
}