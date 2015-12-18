<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\seeds\mysql;

use App\Kernel\App;
use App\Kernel\DbManager;
use App\Models\Type;
use Database\seeds\Seeder;

class TypesSeeder extends Seeder
{
	private $popularTypes = ['Barque', 'Barquentine', 'Caravel', 'Cog', 'Dromon', 'Flyboat', 'Galley', 'Junk', 'Longship'];

	/**
	 * @return mixed
	 */
	public function run()
	{
		foreach (range(1, 7) as $index)
		{
			$name = $this->faker->unique()->randomElement($this->popularTypes);

			$query =
				"INSERT INTO `" . App::getDbName() . "`.`" . Type::$tableName . "` " .
				"(`" . Type::$columnName . "`) " .
				"VALUES ('$name')";

			$query = DbManager::getConnection()->query($query);
		}
		echo "Seed for '" . Type::$tableName . "' table complete.\n";
	}
}