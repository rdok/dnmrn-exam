<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\seeds\mysql;

use App\Kernel\App;
use App\Models\Company;
use App\Models\Repositories\Companies\MySqlDbCompaniesRepository;
use App\Models\Repositories\Vessels\MySqlDbVesselRepository;
use App\Models\Vessel;
use Database\seeds\Seeder;
use PDO;

/**
 * Class CompanyVesselSeeder
 * @package Database\seeds\mysql
 */
class CompanyVesselSeeder extends Seeder
{
	/**
	 * @var MySqlDbCompaniesRepository
	 */
	protected $companyRepository;
	/**
	 * @var MySqlDbVesselRepository
	 */
	protected $vesselRepository;

	/**
	 * CompanyVesselSeeder constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		$this->companyRepository = new MySqlDbCompaniesRepository();
		$this->vesselRepository = new MySqlDbVesselRepository();
	}

	/**
	 * @return mixed
	 */
	public function run()
	{
		$companyIds = $this->companyRepository->getAll([Company::$columnPrimaryKey]);
		$vesselIds = $this->vesselRepository->getAll([Vessel::$columnPrimaryKey]);

		foreach (range(0, 33) as $index)
		{
			$companyId = $this->faker->randomElement($companyIds)[Company::$columnPrimaryKey];
			$vesselId = $this->faker->randomElement($vesselIds)[Vessel::$columnPrimaryKey];

			$query =
				"UPDATE `" . App::getDbName() . "`.`" . Vessel::$tableName . "` " .
				"SET `" . Vessel::$columnCompanyId . "`= :company_id " .
				"WHERE `" . Vessel::$columnPrimaryKey . "` = :vessel_id";

			$query = $this->db->getConnection()->prepare($query);

			$query->bindParam(':company_id', $companyId, PDO::PARAM_INT);

			$query->bindParam(':vessel_id', $vesselId, PDO::PARAM_INT);

			$query->execute();
		}

		echo "Seed for '" . Company::$tableName . "' and '" . Vessel::$tableName . "' tables complete.\n";
	}
}