<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Models;

/**
 * Class Vessel
 * @package App\Models
 */
class Vessel
{
	/**
	 * @var string
	 */
	public static $tableName = 'vessels';
	/**
	 * @var string
	 */
	public static $columnPrimaryKey = 'id_vessels';
	/**
	 * @var string
	 */
	public static $columnImo = 'vessels_imo';
	/**
	 * @var string
	 */
	public static $columnName = 'vessels_name';
	/**
	 * @var string
	 */
	public static $columnCompanyId = 'vessels_company_id';
	/**
	 * @var string
	 */
	public static $columnTypeId = 'vessels_type_id';

	/**
	 * @var string
	 */
	public static $indexTypesVessels = 'types_vessels_id_index';
	/**
	 * @var string
	 */
	public static $foreignTypesVessels = 'types_vessels_id_foreign';
	/**
	 * @var string
	 */
	public static $indexCategoriesVessels = 'companies_vessels_id_index';
	/**
	 * @var string
	 */
	public static $foreignCompaniesVessels = 'companies_vessels_id_foreign';
}