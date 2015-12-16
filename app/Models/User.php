<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Models;

class User
{
	public static $tableName = 'users';
	public static $columnPrimaryKey = 'id';
	public static $columnName = 'name';
}