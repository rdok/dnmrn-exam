<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Models;

abstract class DbRepository
{
	protected $tableName;

	function __construct($tableName)
	{
		$this->tableName = $tableName;
	}

	/**
	 * @param array $fields
	 * @return mixed
	 */
	public function getAll(array $fields = null)
	{
		return $this->tableName;
	}
}