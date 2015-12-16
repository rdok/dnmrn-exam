<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Controllers;

use App\Models\Repositories\Companies\MySqlDbCompaniesRepository;

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
		$companies = $this->companiesRepository->getAll();

		$this->twig->display('companies/index.twig', compact('companies'));
	}

}