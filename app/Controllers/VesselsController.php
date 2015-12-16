<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Controllers;

use App\Models\Repositories\Types\MySqlDbTypesRepository;
use App\Models\Repositories\Vessels\MySqlDbVesselRepository;

/**
 * Class VesselsController
 * @package App\Controllers
 */
class VesselsController extends BaseController
{
	/**
	 * @var MySqlDbVesselRepository
	 */
	protected $vesselsRepository;
	/**
	 * @var MySqlDbTypesRepository
	 */
	protected $typesRepository;

	/**
	 * VesselsController constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		$this->vesselsRepository = new MySqlDbVesselRepository();

		$this->typesRepository = new MySqlDbTypesRepository();
	}

	/**
	 *
	 */
	public function index()
	{
		$vessels = $this->vesselsRepository->getAll();

		$this->twig->display('vessels/index.twig', compact('vessels'));
	}

	/**
	 *
	 */
	public function types()
	{
		$types = $this->typesRepository->getAll();

		$this->twig->display('vessels/types/index.twig', compact('types'));
	}
}