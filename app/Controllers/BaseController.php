<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/12/2015
 */

namespace App\Controllers;

use App\Helpers\Html;
use Twig_Environment;
use Twig_Loader_Filesystem;

/**
 * Class BaseController
 * @package Dnmrn\Controllers
 */
class BaseController
{
	protected $loader;
	protected $twig;

	function __construct()
	{
		$this->loader = new Twig_Loader_Filesystem(__DIR__ . '/../Views');

		$this->twig = new Twig_Environment($this->loader);

		$this->twig->addGlobal('html', new Html());
	}
}