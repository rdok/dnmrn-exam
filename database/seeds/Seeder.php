<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace Database\seeds;

use App\Kernel\DbManager;
use Faker\Factory;

/**
 * Class Seeder
 * @package database\seeds
 */
abstract class Seeder
{
	/**
	 * @var \Faker\Generator
	 */
	protected $faker;
	/**
	 * @var DbManager
	 */
	protected $db;

	/**
	 * Seeder constructor.
	 */
	public function __construct()
	{
		$this->faker = Factory::create();
	}

	/**
	 * @return mixed
	 */
	public abstract function run();
}

