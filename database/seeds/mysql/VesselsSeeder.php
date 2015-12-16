<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\seeds\mysql;

use App\Kernel\App;
use Database\migrations\mysql\CreateVesselsTable;
use Database\seeds\Seeder;

class VesselsSeeder extends Seeder
{

	/**
	 * @return mixed
	 */
	public function run()
	{
		foreach (range(0, 13) as $index)
		{
			$imo = $this->faker->uuid();
			$name = $this->faker->name();

			$query =
				"INSERT INTO `" . App::getDbName() . "`.`" . CreateVesselsTable::$tableName . "` " .
				"(`" . CreateVesselsTable::$columnImo . "`, `" . CreateVesselsTable::$columnName . "`) " .
				"VALUES ('$imo', '$name')";

			$this->db->getConnection()->query($query);
		}
		echo "Seed for '" . CreateVesselsTable::$tableName . "' table complete.\n";
	}
}