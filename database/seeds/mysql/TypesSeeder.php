<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\seeds\mysql;

use App\Kernel\App;
use App\Models\Type;
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
				"INSERT INTO `" . App::getDbName() . "`.`" . Type::$tableName . "` " .
				"(`" . Type::$columnName . "`) " .
				"VALUES ('$name')";

			$this->db->getConnection()->query($query);
		}
		echo "Seed for '" . Type::$tableName . "' table complete.\n";
	}
}