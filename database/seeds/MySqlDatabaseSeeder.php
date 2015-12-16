<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\seeds;
use Database\seeds\mysql\CompaniesSeeder;
use Database\seeds\mysql\TypesSeeder;
use Database\seeds\mysql\UsersSeeder;
use Database\seeds\mysql\VesselsSeeder;

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
	 * @var VesselsSeeder
	 */
	private $vesselsSeeder;
	/**
	 * @var TypesSeeder
	 */
	private $typesSeeder;
	/**
	 * @var CompaniesSeeder
	 */
	private $companiesSeeder;

	/**
	 * MySqlDatabaseSeeder constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		$this->usersSeeder = new UsersSeeder();
		$this->vesselsSeeder = new VesselsSeeder();
		$this->typesSeeder = new TypesSeeder();
		$this->companiesSeeder = new CompaniesSeeder();
	}

	/**
	 *
	 */
	public function run()
	{
		$this->usersSeeder->run();
		$this->vesselsSeeder->run();
		$this->typesSeeder->run();
		$this->companiesSeeder->run();
	}
}