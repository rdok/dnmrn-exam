<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\seeds\mysql;

use App\Kernel\App;
use App\Models\Company;
use App\Models\Repositories\Companies\MySqlDbCompaniesRepository;
use App\Models\Repositories\Types\MySqlDbTypesRepository;
use App\Models\Repositories\Vessels\MySqlDbVesselRepository;
use App\Models\Type;
use App\Models\Vessel;
use Database\seeds\Seeder;
use PDO;

/**
 * Class CompanyVesselSeeder
 * @package Database\seeds\mysql
 */
class TypeVesselSeeder extends Seeder
{
	/**
	 * @var MySqlDbCompaniesRepository
	 */
	protected $typeRepository;
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

		$this->typeRepository = new MySqlDbTypesRepository();
		$this->vesselRepository = new MySqlDbVesselRepository();
	}

	/**
	 * @return mixed
	 */
	public function run()
	{
		$typeIds = $this->typeRepository->getAll([Type::$columnPrimaryKey]);
		$vesselIds = $this->vesselRepository->getAll([Vessel::$columnPrimaryKey]);

		foreach ($vesselIds as $vesselId)
		{
			$vesselId = $vesselId[Vessel::$columnPrimaryKey];

			$typeId = $this->faker->randomElement($typeIds)[ Type::$columnPrimaryKey ];

			$query =
				"UPDATE `" . App::getDbName() . "`.`" . Vessel::$tableName . "` " .
				"SET `" . Vessel::$columnTypeId . "`= :type_id " .
				"WHERE `" . Vessel::$columnPrimaryKey . "` = :vessel_id";

			$query = $this->db->getConnection()->prepare($query);

			$query->bindParam(':type_id', $typeId, PDO::PARAM_INT);

			$query->bindParam(':vessel_id', $vesselId, PDO::PARAM_INT);

			$query->execute();
		}

		echo "Seed for '" . Vessel::$tableName . "' and '" . Type::$tableName . "' tables complete.\n";
	}
}