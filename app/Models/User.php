<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Models;

/**
 * Class User
 * @package App\Models
 */
class User
{
	/**
	 * @var string
	 */
	public static $tableName = 'users';
	/**
	 * @var string
	 */
	public static $columnPrimaryKey = 'id_users';
	/**
	 * @var string
	 */
	public static $columnName = 'users_name';
	/**
	 * @var string
	 */
	public static $columnFirstName = 'users_f_name';
	/**
	 * @var string
	 */
	public static $columnLastName = 'users_l_name';
	/**
	 * @var string
	 */
	public static $columnEmail = 'users_email';
	/**
	 * @var string
	 */
	public static $columnPassword = 'users_password';
}