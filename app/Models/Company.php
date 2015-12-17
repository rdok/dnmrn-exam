<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Models;

/**
 * Class Company
 * @package App\Models
 */
class Company
{
	/**
	 * @var string
	 */
	public static $tableName = 'companies';
	/**
	 * @var string
	 */
	public static $columnPrimaryKey = 'id_companies';
	/**
	 * @var string
	 */
	public static $columnName = 'companies_name';

	/**
	 * @var string
	 */
	public static $columnUserId = 'companies_user_id';

	/**
	 * @var string
	 */
	public static $indexCompaniesUsers = 'companies_users_id_index';
	/**
	 * @var string
	 */
	public static $foreignCompaniesUsers = 'companies_users_id_foreign';
}