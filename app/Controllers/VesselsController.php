<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Controllers;

use App\Models\Repositories\MySqlDbVesselRepository;
use Database\migrations\mysql\CreateUsersTable;

class VesselsController extends BaseController
{
	protected $vesselsRepository;

	public function __construct()
	{
		parent::__construct();

		$this->vesselsRepository = new MySqlDbVesselRepository(CreateUsersTable::$tableName);
	}

	public function index()
	{
		$vessels = $this->vesselsRepository->getAll();

		$this->twig->display('vessels/index.twig', compact('vessels'));
	}

}