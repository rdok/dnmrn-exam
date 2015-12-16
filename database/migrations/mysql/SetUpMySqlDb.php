<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\migrations\mysql;

/**
 * Class SetUpMySqlDb
 * @package Database\migrations\mysql
 */
class SetUpMySqlDb
{
	/**
	 * @var CreateVesselsTable
	 */
	private $createShipsTable;
	/**
	 * @var CreateTypesTable
	 */
	private $createTypesTable;
	/**
	 * @var CreateCompaniesTable
	 */
	private $createCompaniesTable;
	/**
	 * @var CreateUsersTable
	 */
	private $createUsersTable;
	/**
	 * @var AddTypeToVesselTable
	 */
	private $addTypeToVesselTable;
	/**
	 * @var AddCompanyToVesselTable
	 */
	private $addCompanyToVesselTable;
	/**
	 * @var AddUserToCompanyTable
	 */
	private $addUserToCompanyTable;

	/**
	 *
	 */
	public function __construct()
	{
		$this->createShipsTable = new CreateVesselsTable();
		$this->createTypesTable = new CreateTypesTable();
		$this->createCompaniesTable = new CreateCompaniesTable();
		$this->createUsersTable = new CreateUsersTable();
		$this->addTypeToVesselTable = new AddTypeToVesselTable();
		$this->addCompanyToVesselTable = new AddCompanyToVesselTable();
		$this->addUserToCompanyTable = new AddUserToCompanyTable();
	}

	/**
	 * Run the migrations
	 */
	public function up()
	{
		$this->createShipsTable->up();
		$this->createTypesTable->up();
		$this->createCompaniesTable->up();
		$this->createUsersTable->up();

		$this->addTypeToVesselTable->up();
		$this->addCompanyToVesselTable->up();
		$this->addUserToCompanyTable->up();

		echo "Migration process completed.\n\n";
	}

	/**
	 * Reverse the migrations
	 */
	public function down()
	{
		$this->createShipsTable->down();
		$this->createTypesTable->down();
		$this->createUsersTable->down();
		$this->createCompaniesTable->down();

		echo "Database tables destroyed.\n\n";
	}
}