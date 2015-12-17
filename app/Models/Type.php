<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Models;

/**
 * Class Type
 * @package App\Models
 */
class Type
{
	/**
	 * @var string
	 */
	public static $tableName = 'types';
	/**
	 * @var string
	 */
	public static $columnPrimaryKey = 'id_types';
	/**
	 * @var string
	 */
	public static $columnName = 'types_name';
}