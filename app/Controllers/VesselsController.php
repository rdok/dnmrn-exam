<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Controllers;

class VesselsController extends BaseController
{
	public function index()
	{
		$this->twig->display('vessels/index.twig');
	}

}