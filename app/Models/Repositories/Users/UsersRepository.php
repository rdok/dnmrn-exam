<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Models\Repositories\Users;

interface UsersRepository
{

	/**
	 * @param array $fields
	 * @return mixed
	 */
	public function getAll(array $fields = null);

	/**
	 * @param int $from
	 * @param int $to
	 * @return mixed
	 */
	public function getWithRelations($from = 1, $to = 10);

	/**
	 * @param $userId
	 * @return mixed
	 */
	public function getById($userId);
}