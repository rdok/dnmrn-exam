<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Models\Repositories\Users;

use App\Models\Repositories\MySqlDbRepository;
use App\Models\User;

class MySqlDbUsersRepository extends MySqlDbRepository implements UsersRepository
{
	public function __construct()
	{
		parent::__construct(User::$tableName);
	}

}