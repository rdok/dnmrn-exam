<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Models;

class Vessel
{
	public static $tableName = 'vessels';
	public static $columnPrimaryKey = 'id';
	public static $columnImo = 'imo';
	public static $columnName = 'name';
	public static $columnCompanyId = 'company_id';
	public static $indexCategoriesVessels = 'companies_vessels_id_index';
	public static $foreignCompaniesVessels = 'companies_vessels_id_foreign';
	public static $columnForeignKey = 'id';
}