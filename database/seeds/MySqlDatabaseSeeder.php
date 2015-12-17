<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\seeds;

use Database\seeds\mysql\CompaniesSeeder;
use Database\seeds\mysql\CompanyUserSeeder;
use Database\seeds\mysql\CompanyVesselSeeder;
use Database\seeds\mysql\TypesSeeder;
use Database\seeds\mysql\TypeVesselSeeder;
use Database\seeds\mysql\UsersSeeder;
use Database\seeds\mysql\VesselsSeeder;

/**
 * Class MySqlDatabaseSeeder
 * @package Database\seeds\mysql
 */
class MySqlDatabaseSeeder extends Seeder
{
	/**
	 * @var CompanyVesselSeeder
	 */
	protected $companyVesselSeeder;
	/**
	 * @var TypeVesselSeeder
	 */
	protected $typeVesselSeeder;
	/**
	 * @var CompanyUserSeeder
	 */
	protected $companyUserSeeder;
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
		$this->companyVesselSeeder = new CompanyVesselSeeder();
		$this->typeVesselSeeder = new TypeVesselSeeder();
		$this->companyUserSeeder = new CompanyUserSeeder();
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
		$this->companyVesselSeeder->run();
		$this->typeVesselSeeder->run();
		$this->companyUserSeeder->run();
	}
}