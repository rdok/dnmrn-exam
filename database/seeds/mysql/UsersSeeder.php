<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\seeds\mysql;

use App\Kernel\App;
use App\Models\User;
use Database\migrations\mysql\CreateUsersTable;
use Database\seeds\Seeder;

class UsersSeeder extends Seeder
{

	/**
	 * @return mixed
	 */
	public function run()
	{
		foreach (range(0, 13) as $index)
		{
			$firstName = $this->faker->firstName();
			$lastName = $this->faker->lastName();
			$email = $this->faker->unique()->email();
			$password = password_hash($this->faker->password(), PASSWORD_DEFAULT);

			$query =
				"INSERT INTO `" . App::getDbName() . "`.`" . User::$tableName . "` " .
				"(`" . User::$columnFirstName . "`, `" . User::$columnLastName . "`," .
				"`" . User::$columnEmail . "`, `" . User::$columnPassword . "`) " .
				"VALUES ('$firstName', '$lastName', '$email', '$password')";

			$this->db->getConnection()->query($query);
		}
		echo "Seed for '" . User::$tableName . "' table complete.\n";
	}
}