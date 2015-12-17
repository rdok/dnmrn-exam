<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Controllers;

use App\Models\Repositories\Companies\MySqlDbCompaniesRepository;
use JasonGrimes\Paginator;

class CompaniesController extends BaseController
{
	protected $companiesRepository;

	public function __construct()
	{
		parent::__construct();

		$this->companiesRepository = new MySqlDbCompaniesRepository();
	}

	public function index()
	{
		$currentPage = intval(isset($_GET['pg']) ? $_GET['pg'] : 1);
		$from = $currentPage < 1 ? 0 : ($currentPage - 1) * 10;
		$to = $currentPage + 10;

		$companies = $this->companiesRepository->getWithRelations($from, $to);
		$totalItems = $this->companiesRepository->count();

		$itemsPerPage = 10;
		$urlPattern = '/companies?pg=(:num)';
		$paginate = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

		$companies = json_decode(json_encode($companies), false);

		$this->twig->display('companies/index.twig', compact('companies', 'paginate'));
	}

}