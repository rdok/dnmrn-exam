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
}