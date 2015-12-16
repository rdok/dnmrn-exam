<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\seeds\mysql;

use Database\seeds\Seeder;

/**
 * Class MySqlDatabaseSeeder
 * @package Database\seeds\mysql
 */
class MySqlDatabaseSeeder extends Seeder
{
	/**
	 * @var UsersSeeder
	 */
	private $usersSeeder;

	/**
	 * MySqlDatabaseSeeder constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		$this->usersSeeder = new UsersSeeder();
	}

	/**
	 *
	 */
	public function run()
	{
		$this->usersSeeder->run();
	}
}