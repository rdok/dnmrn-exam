<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\seeds\mysql;

use App\Kernel\App;
use App\Models\Company;
use App\Models\Repositories\Companies\MySqlDbCompaniesRepository;
use App\Models\Repositories\Users\MySqlDbUsersRepository;
use App\Models\Repositories\Vessels\MySqlDbVesselRepository;
use App\Models\User;
use Database\seeds\Seeder;
use PDO;

/**
 * Class CompanyVesselSeeder
 * @package Database\seeds\mysql
 */
class CompanyUserSeeder extends Seeder
{
	/**
	 * @var MySqlDbCompaniesRepository
	 */
	protected $companyRepository;
	/**
	 * @var MySqlDbVesselRepository
	 */
	protected $userRepository;

	/**
	 * CompanyVesselSeeder constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		$this->companyRepository = new MySqlDbCompaniesRepository();

		$this->userRepository = new MySqlDbUsersRepository();
	}

	/**
	 * @return mixed
	 */
	public function run()
	{
		$companyIds = $this->companyRepository->getAll([Company::$columnPrimaryKey]);
		$userIds = $this->userRepository->getAll([User::$columnPrimaryKey]);

		foreach (range(0, 13) as $index)
		{
			$companyId = $this->faker->randomElement($companyIds);
			$companyId = $companyId[ Company::$columnPrimaryKey ];
			$userId = $this->faker->randomElement($userIds)[ User::$columnPrimaryKey ];

			$query =
				"UPDATE `" . App::getDbName() . "`.`" . Company::$tableName . "` " .
				"SET `" . Company::$columnUserId . "`= :user_id " .
				"WHERE `" . Company::$columnPrimaryKey . "` = :company_id";

			$query = $this->db->getConnection()->prepare($query);

			$query->bindParam(':company_id', $companyId, PDO::PARAM_INT);

			$query->bindParam(':user_id', $userId, PDO::PARAM_INT);

			$query->execute();
		}

		echo "Seed for '" . Company::$tableName . "' and '" . User::$tableName . "' tables complete.\n";
	}
}