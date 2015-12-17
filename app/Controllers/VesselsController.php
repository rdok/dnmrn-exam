<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Controllers;

use App\Models\Repositories\Types\MySqlDbTypesRepository;
use App\Models\Repositories\Vessels\MySqlDbVesselRepository;
use JasonGrimes\Paginator;

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
		$currentPage = intval(isset($_GET['pg']) ? $_GET['pg'] : 1);
		$from = $currentPage < 1 ? 0 : ($currentPage - 1) * 10;
		$to = $currentPage + 10;

		$vessels = $this->vesselsRepository->getWithRelations($from, $to);
		$totalItems = $this->vesselsRepository->count();

		$itemsPerPage = 10;
		$urlPattern = '/vessels?pg=(:num)';
		$paginate = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

		$vessels = json_decode(json_encode($vessels), false);

		$this->twig->display('vessels/index.twig', compact('vessels', 'paginate'));
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