<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\seeds\mysql;

use App\Kernel\App;
use App\Kernel\DbManager;
use App\Models\Vessel;
use Database\seeds\Seeder;

class VesselsSeeder extends Seeder
{
	private $popularNames =
		['USS Arizona', 'Japanese battleship Yamato', 'RMS Titanic', 'HMAV Titanic', 'HMAV',
			'SS Andrea Doria', 'HMHS Britannic', 'USS Constitution', 'SS Baychimo', 'MS Achille Lauro', 'MS Oranje', 'HMS Victory',
			'USS Monitor', 'German battleship Bismarck', 'HMS Ark Royal', 'Bluenose', 'Ariel'];

	/**
	 * @return mixed
	 */
	public function run()
	{
		foreach (range(0, sizeof($this->popularNames) - 1) as $index)
		{
			$imo = "IMO" . $this->faker->unique()->randomNumber(7);
			$name = $this->faker->unique()->randomElement($this->popularNames);

			$query =
				"INSERT INTO `" . App::getDbName() . "`.`" . Vessel::$tableName . "` " .
				"(`" . Vessel::$columnImo . "`, `" . Vessel::$columnName . "`) " .
				"VALUES ('$imo', '$name')";

			$query = DbManager::getConnection()->query($query);
		}
		echo "Seed for '" . Vessel::$tableName . "' table complete.\n";
	}
}