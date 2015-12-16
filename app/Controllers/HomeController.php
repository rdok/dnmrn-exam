<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */
namespace App\Controllers;

/**
 * Class HomeController
 * @package Dnmrn\Controllers
 */
class HomeController extends BaseController
{

	/**
	 * @return string
	 */
	public function home()
	{
		$this->twig->display('home.twig');
	}
}