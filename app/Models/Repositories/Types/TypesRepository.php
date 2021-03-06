<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Models\Repositories\Types;

/**
 * Interface TypesRepository
 * @package App\Models\Repositories\Types
 */
interface TypesRepository
{

	/**
	 * @param array $fields
	 * @return mixed
	 */
	public function getAll(array $fields = null);
}