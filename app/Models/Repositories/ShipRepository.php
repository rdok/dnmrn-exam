<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace app\Models\Repositories;

/**
 * Interface ShipRepository
 * @package app\Models\Repositories
 */
interface ShipRepository
{

	/**
	 * @param array $fields
	 * @return mixed
	 */
	public function getAll(array $fields = null);
}